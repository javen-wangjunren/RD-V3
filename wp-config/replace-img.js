const fs = require('fs');
const path = require('path');
const csvtojsonV2 = require("csvtojson/v2");
const jsonToCSV = require('json-to-csv');
const bethemeChild = path.resolve(__dirname, '../')

let csvData = []
let successList = []
let failList = []
async function replacsImg () {

	csvData = await csvtojsonV2().fromFile(path.join(bethemeChild, '/src/img-slice/img-slice.csv'))

	const projectTplPath = path.join(bethemeChild, '/templates/')
	const tpls = fs.readdirSync(path.join(bethemeChild, '/templates/'))
	const imgPathReg = /<img.+src="(.+\.(jpe?g|png|gif))".*\/?>/g;
	const defaultImgPath = '/wp-content/themes/mml-theme/dist/img/';

	// 遍历读取模版内容
	for (let i = 0; i < tpls.length; i++) {
		if (/^.+(\.php)$/.test(tpls[i])) {
			let tplCont = fs.readFileSync(path.join(projectTplPath, tpls[i])).toString();
			// 如果是写死的 img 标签，读取出来
			let imgs = tplCont.match(imgPathReg)
			if (imgs) {
				// 遍历读取出来的 img 标签
				for (let j = 0; j < imgs.length; j++) {
					let pathKey = imgs[j].match(/(src=".+\.(jpe?g|png|gif))"/g)[0].replace(/src="(.+\.(jpe?g|png|gif))"/, '$1').replace(defaultImgPath, '');
					for (let k = 0; k < csvData.length; k++) {
						// 如果读取出来的标签 与 csv 数据有对应，则把 img 标签注入 csv对应的数据中，方便下一步进行匹配替换
						if (pathKey === csvData[k].path) {
							csvData[k].imgPath = imgs[j]
							csvData[k].imgSource = imgs[j]
						}
					}
				}
			}
		}
	}

	csvData.forEach(item => {
		let imgAlt;
		let imgReg = new RegExp(item.imgSource, 'g')

		// 遍历 csv 数据注入 alt
		if (item.imgPath.indexOf('alt="') > -1) {
			imgAlt = item.imgPath.replace(/alt=".*"/g, 'alt="'+ item.alt.replace(/-/g, ' ') +'"')
		} else {
			imgAlt = item.imgPath.replace(/(src=".*")/g, '$1 alt="'+ item.alt.replace(/-/g, ' ') +'"')
		}

		// 遍历模版
		tpls.forEach(child => {
			if (/^.+(\.php)$/.test(child)) {
				let cacheImgAlt = imgAlt
				// 如果是header、footer、home 页面注入懒加载代码
				if (/(header|home|footer|ldp)\.php/ig.test(child.toLowerCase())) {
					imgAlt = imgAlt.replace(/src/g, 'data-src')
					if (item.imgPath.indexOf('class=') === -1) {
						imgAlt = imgAlt.replace(/(alt=".*")/g, ' class="lazyload" $1')
					} else {
						imgAlt = imgAlt.replace(/(class=")/g, ' class="lazyload ')
					}
					imgAlt = imgAlt.replace('data-src', 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-src')
				}
				// 读取模版字符串，注入生成好的 img 标签
				let tplCont = fs.readFileSync(path.join(projectTplPath, child)).toString();
				tplCont = tplCont.replace(imgReg, imgAlt);
				let itemIndex = tplCont.indexOf(item.imgPath)
				fs.writeFileSync(path.join(projectTplPath, child), tplCont)
				if (itemIndex) {
					if (successList.indexOf(item.path) === -1) {
						successList.push(item.path)
					}
				} else {
					if (failList.indexOf(item.path)) {
						failList.push(item.path)
					}
				}
				imgAlt = cacheImgAlt
			}
		})
	})

	console.log('=========================================================================')
	console.log('以下图片成功添加 alt')
	successList.forEach(item => {
		console.log(item)
	})

	console.log('=========================================================================')
	console.log('以下图片没有在页面中添加 alt，请检查是不是路径不对应；如果是页面中没有引用的则不用理会')
	failList.forEach(item => {
		console.log(item)
	})
}

replacsImg()
