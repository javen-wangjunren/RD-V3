// 创建 php 模版
const fs = require('fs')
const fsExtra = require('fs-extra')
const mkdirp = require('mkdirp')
const path = require('path')
const utils = require('./utils.js')
const projectRoot = path.resolve(__dirname, '../')

const name = process.argv[2]
const cssPath = ''
const argv = require('yargs')
	.options('f', {
	  alias: 'file', // 别名
	  demand: true, //必填项
	  describe: 'Please enter the file name',
	  type: 'string'
	})
	.usage('Usage: npm run create [options]')
	.example('npm run create p01-home')
	.help('h')
	.alias('h', 'help')
	.argv

var pageFiles = argv._
argv.file ? pageFiles.unshift(argv.file) : pageFiles;
if (pageFiles.length === 0) {
  console.log('Please enter the file name')
  console.log('Usage npn run create p01-home')
  return;
}

pageFiles = utils.unique(pageFiles)

function createPhpFile (name) {
	let details = name.indexOf('details') > -1 ? 'Template Post Type: post, page, product, portfolio' : '';
	let isLDP = name.indexOf('ldp') === 0;
	let template = `<?php
/**
 * Template Name: MML-${name}
 * ${details}
 */

get_header();
?>`;

	let html = '\n\n\n\n<!-- Please write the HTML code here -->\n\n\n\n';
	let ldpJS = isLDP ? '<script>\n\twindow.ldp = true;\n</script>\n' : '';
	let footer = `<?php get_footer();\n`;
	template += html + ldpJS + footer
	let filePath = `${projectRoot}/templates/${name}.php`
	fs.writeFileSync(filePath, template)
  console.log('create '+ name +'.php file success')
}

function creatrSassFile (name) {
	let pagePathe = path.join(`${projectRoot}/src/less/pages`);

	if (!fs.existsSync(pagePathe)) {
		fs.mkdirSync(pagePathe);
	}

	let filePath = `${projectRoot}/src/less/pages/${name}.less`
	fs.writeFileSync(filePath, '')
  console.log('create '+ name +'.less file success')
}

function updateMainScss (str) {
	let filePath = `${projectRoot}/src/less/main.less`
	let mainCont = fs.readFileSync(filePath)
	fs.writeFileSync(filePath, mainCont + str)
	console.log('write less file success')
}

let str = ''
pageFiles.forEach(function(name, index){
	name = name.toLocaleLowerCase()
  createPhpFile(name)
  creatrSassFile(name)
  str += `\n@import "pages/${name}";`
})

updateMainScss(str)
