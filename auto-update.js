require('dotenv').config()

const fs = require('fs');
const YAML = require('yaml');
const axios = require('axios');
const FormData = require('form-data');
const Schema = require( 'validate' );

const configFilePath = './config.yml';
const readmeTxt = './readme.txt';
const readmeMd = './readme.md';

const { execSync } = require('child_process');

/**
 * Check if the current GIT branch is master.
 * Used to prevent gulp deploy on non master branches.
 *
 * @return bool true if current branch is master branch, false if not.
 */
const isMasterBranch = () => {
  const currentBranch = execSync('git rev-parse --abbrev-ref HEAD');
  return currentBranch.toString().toLowerCase().trim() === 'master';
}

/**
 * Parse a Yaml file.
 */
const parseYamlFile = (yamlFile) => {
  const readme = fs.readFileSync(yamlFile, 'utf8');
  const yamlObject = YAML.parse(readme);
  return yamlObject;
};

/**
 * Validate a yalm object.
 */
const validateYamlObject = (yamlObject) => {
  const config = new Schema({
    name: {
      type: String,
      required: true
    },
    category: {
      type: String,
      required: true,
      enum: ['plugin', 'theme']
    },
    sku: {
      type: String,
      required: true,
      match: /^[A-Z]+$/
    },
    filesalt: {
      type: String,
      required: true,
    },
    rootfolder: {
      type: String,
      required: true,
    },
    changelog: [{
      version: {
        type: String,
        required: true,
        match: /^[1-9]\.[0-9]\.[0-9]+$/
      },
      date: {
        type: String,
        required: true,
        match: /^20\d{2}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/
      },
      added: {
        type: Array,
        required: false,
        elements: [{type: String}]
      },
      updated: {
        type: Array,
        required: false,
        elements: [{type: String}]
      },
      fixed: {
        type: Array,
        required: false,
        elements: [{type: String}]
      }
    }]
  });
  const test = config.validate(yamlObject);
  return test;
}

/**
 * Get the config obect from config.yml
 */
const getConfig = () => {
  return parseYamlFile(configFilePath);
}

/**
 * Validate config.yml
 */
const validateConfig = () => {
  return validateYamlObject(getConfig());
}

/**
 * Generate readme.txt from config.yml
 */
const generateReadMeTxt = () => {
  const file = readmeTxt;
  const configFile = configFilePath;
  try {
    deleteFile(file);
    const product = parseYamlFile(configFile);

    write(file, `== ${product.name} ==` + eol(2));
    write(file, '== Changelog ==' + eol());
    product.changelog.forEach( release => {
      write(file, `= ${release.version} = ${release.date}` + eol());
      if ('added' in release) {
        release.added.forEach(add => write(file, `* Added: ${add}` + eol()));
      }
      if ('updated' in release) {
        release.updated.forEach(update => write(file, `* Updated: ${update}` + eol()));
      }
      if ('fixed' in release) {
        release.fixed.forEach(fix => write(file, `* Fixed: ${fix}` + eol()));
      }
      write(file, eol());
    });
  } catch(err) {
    console.log('y a une erreur');
    console.error(err);
  }
}

/**
 * Generate readme.md from config.yml
 */
const generateReadMeMd = () => {
  const file = readmeMd;
  const configFile = configFilePath;
  try{
    deleteFile(file);
    const product = parseYamlFile(configFile);
    write(file, '# Changelog' + eol());
    product.changelog.forEach( release => {
      write(file, `## [${release.version}] - ${release.date}` + eol());
      if ('added' in release) {
        write(file, `### Added` + eol());
        release.added.forEach(add => write(file, `- ${add}` + eol()));
      }
      if ('updated' in release) {
        write(file, `### Updated` + eol());
        release.updated.forEach(update => write(file, `- ${update}` + eol()));
      }
      if ('fixed' in release) {
        write(file, `### Fixed` + eol());
        release.fixed.forEach(fix => write(file, `- ${fix}` + eol()));
      }
      write(file, eol());
    });
  } catch(err) {
    console.error(err);
  }
}

/**
 * Prepare data from config.yml fo deployment.
 */
const prepareDataForDeploy = () => {
  const configFile = configFilePath;
  const product = parseYamlFile(configFile);
  return {
    sku: product.sku,
    version: product.changelog[0].version,
    date: product.changelog[0].date,
    zipname: `${product.category}-${product.sku}-${product.filesalt}.zip`,
    changelog: JSON.stringify(product.changelog)
  };
}

/**
 * Deploy the latest version.
 * Call API and send all new informations.
 * Stop everything with a try/catch on any error.
 */
const deployNewVersion = async () => {
  try {
    const {sku, version, date, zipname, changelog} = prepareDataForDeploy();

    let formData = new FormData();
    formData.append('nonce', process.env.NONCE);
    formData.append('product_sku', sku);
    formData.append('new_version', version);
    formData.append('release_date', date);
    formData.append('changelog', changelog);
    formData.append('zip_file', fs.createReadStream(`./dist/${zipname}`));

    const apiEndpoint = isMasterBranch() ?
        process.env.API_UPDATE_PRODUCT_ENDPOINT_PROD :
        process.env.API_UPDATE_PRODUCT_ENDPOINT_DEV;

    const response = await axios.post(
      apiEndpoint,
      formData,
      { headers: { ...formData.getHeaders() } }
    );
    console.log(' ==== API RESPONSE ==== ');
    console.log(response.data);
  } catch (error) {
    console.log(' ==== API ERROR ==== ');
    console.error(error);
  }
}

/**
 * Write in a file (sync and utf8).
 */
const write = (file, content) => {
  fs.appendFileSync(file, content, 'utf8');
}

/**
 * Delete a given file.
 */
const deleteFile = (file) => {
  try {
    fs.unlinkSync(file);
  } catch(err) {}
}

/**
 * Go to line ctp times.
 */
const eol = function (cpt = 1) {
  let eol = '';
  for ( i = 1; i <= cpt; i++ ) {
    eol += "\n";
  }
  return eol;
}

exports.getConfig = getConfig;
exports.isMasterBranch = isMasterBranch;
exports.validateConfig = validateConfig;
exports.generateReadMeTxt = generateReadMeTxt;
exports.generateReadMeMd = generateReadMeMd;
exports.deployNewVersion = deployNewVersion;

