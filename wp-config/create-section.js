const fs = require('fs');
const path = require('path');
const fsExtra = require('fs-extra');
const mkdirpSync = require('mkdirp-sync');
const projectRoot = path.resolve(__dirname, '../');
const utils = require('./utils.js');

const name = process.argv[2]
const cssPath = ''
const argv = require('yargs')
	.options('f', {
	  alias: 'file', // 别名
	  demand: true, //必填项
	  describe: 'Please enter the section name',
	  type: 'string'
	})
	.usage('Usage npm run createSection [options]')
	.example('npn run createSection banner_001')
	.help('h')
	.alias('h', 'help')
	.argv

var pageFiles = argv._
argv.file ? pageFiles.unshift(argv.file) : pageFiles;
if (pageFiles.length === 0) {
  console.log('Please enter the section name')
  console.log('Usage npn run createSection banner_001')
  return;
}

pageFiles = utils.unique(pageFiles)


function copySection (name) {
	let sectionPathe = path.join(`${projectRoot}/sections/${name}`);
	if (!fs.existsSync(sectionPathe)) {
		fs.mkdirSync(sectionPathe);
	}


	const tplPhp = path.join(projectRoot, '/sections/templates/templates.php')
	let tplPhpCont = fs.readFileSync(tplPhp).toString()
	tplPhpCont = tplPhpCont.replace(/(class templates extends MML_Section_Base)/g, `class ${name}  extends MML_Section_Base`)
	let phpFilePath = `${projectRoot}/sections/${name}/${name}.php`
	fs.writeFileSync(phpFilePath, tplPhpCont)
	console.log('create '+ name +'.php file success')


	let scssFilePath = `${projectRoot}/sections/templates/templates.scss`
	let tplScssCont = fs.readFileSync(scssFilePath).toString()
	fs.writeFileSync(`${projectRoot}/sections/${name}/${name}.scss`, tplScssCont)
	console.log('create '+ name +'.scss file success')


	let htmlFilePath = `${projectRoot}/sections/templates/templates.html`
	let tplHtmlCont = fs.readFileSync(htmlFilePath).toString()
	tplHtmlCont = tplHtmlCont.replace(/({{template}})/g, `${name}`)
	fs.writeFileSync(`${projectRoot}/sections/${name}/${name}.html`, tplHtmlCont)
	console.log('create '+ name +'.html file success')
}


pageFiles.forEach(function(name, index){
  copySection(name)
})
