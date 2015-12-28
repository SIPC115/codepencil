// /**
// * 判断是否有某个className
// * @param {HTMLElement} element 元素
// * @param {string} className className
// * @return {boolean}
// */
// function hasClass(element, className) {
//     var classNames = element.className;
//     if (!classNames) {
//         return false;
//     }
//     classNames = classNames.split(/\s+/);
//     for (var i = 0, len = classNames.length; i < len; i++) {
//         if (classNames[i] === className) {
//             return true;
//         }
//     }
//     return false;
// }

// /**
// * 添加className
// *
// * @param {HTMLElement} element 元素
// * @param {string} className className
// */
// function addClass(element, className) {
//     if (!hasClass(element, className)) {
//         element.className = element.className ?[element.className, className].join(' ') : className;
//     }
// }

// /**
// * 删除元素className
// *
// * @param {HTMLElement} element 元素
// * @param {string} className className
// */
// function removeClass(element, className) {
//     if (className && hasClass(element, className)) {
//         var classNames = element.className.split(/\s+/);
//         for (var i = 0, len = classNames.length; i < len; i++) {
//             if (classNames[i] === className) {
//                 classNames.splice(i, 1);
//                 break;
//             }
//         }
//     }
//     element.className = classNames.join(' ');
// }

// var pagination = document.getElementsByClassName("pagination")[0],
//     preBtn = pagination.getElementsByClassName("pre")[0],
//     nextBtn = pagination.getElementsByClassName("next")[0],
//     disableBtn = pagination.getElementsByClassName("disable"),
//     page = pagination.getElementsByTagName('span'),
//     centerPage = pagination.getElementsByClassName('centerPage'),
//     center = document.getElementById("center");

// pagination.addEventListener('click',function(e){
//     if(e.target && e.target.nodeName === "SPAN"){
//         var oldCurpage = pagination.getElementsByClassName("active")[0];

//         removeClass(oldCurpage,"active");
//         addClass(e.target,"active");
//         var curPage = pagination.getElementsByClassName("active")[0];

//         goPage(curPage,22);
//     }
// },false)

// function goPage(curPage,allPages){
//     var preIs = false,//上一页判断
//     nextIs = true,//下一页
//     disable_aIs = false,//前面的...
//     disable_bIs = true,//后面的...
//     curPageValue = curPage.textContext,
//     page = pagination.getElementsByTagName("span");

//     if(curPageValue > 1){
//         preIs = true;
//     }
//     if(allPages == curPageValue){
//         nextIs = false; 
//     }
//     if(curPageValue > 5){
//         disable_aIs = true;
//     }
//     if(allPages - curPageValue <= 5){
//         disable_bIs = false;
//     }

//     page[page.length-1].textContext = allPages;
//     page[0].textContext = "1";

//     function eleDisplay(basis,ele){
//         if(!basis){
//             ele.style.display = "none";
//         }else{
//             ele.style.display = "inline-block";
//         }
//     }
//     eleDisplay(preIs,preBtn);
//     eleDisplay(nextIs,nextBtn);
//     eleDisplay(disable_aIs,disableBtn[0]);
//     eleDisplay(disable_bIs,disableBtn[1]);

//     if(page.length<9){
//         var newPage = document.createElement('span');
//         newPage.innerHTML = "<span>"+(curPageValue+3)+"</span>";
//         addClass(newPage,"page");
//         centerPage[0].appendChild(newPage);
//     }

//     if(!disable_aIs){
// //  如果没有前面的...
//         for(var i = 0;i<page.length-1;i++){
//             page[i].textContext = (i+1);
//         }
//     }else{
//         for(var i = 1,j=(curPageValue-3);i<(page.length-1);i++,j++){
//             page[i].textContext = j;
//         }
//     }
// }   



function ajax(url) {
    var xhr = new XMLHttpRequest();
    var type = 'GET';
    if(options.data === "object"){    //创建一个跨浏览器的ajax对象
        urlstr = toUrlstr(options.data);
    }else if(options.data == "string"){
        urlstr = options.data;
    }
    xhr.open(type,url,true);//页面地址需要加上
    xhr.send();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if((xhr.status >= 200 && xhr.status <300) || xhr.status == 304){
                onsuccess(xhr.responseText,xhr);
            }else{
                onfail(xhr.responseText,xhr);
            }
        }
    };//相应状态
}
function onsuccess(xhr.responseText,xhr){
    console.log(xhr.responseText);
}













