var styleManager = (function()
{
    // Create the <style> tag
    var style = document.createElement("style")

    // WebKit hack
    style.appendChild(document.createTextNode(""));

    // Add the <style> element to the page
    document.head.appendChild(style);

    function getStyleRuleIndexBySelector(selector, prop){
        var result = [], i,
            value = (prop ? selector + "{" + prop + "}" : selector).replace(/\s/g, ''), // remove whitespaces
            s = prop ? "cssText" : "selectorText";

        for( i=0; i < style.sheet.cssRules.length; i++ )
            if( style.sheet.cssRules[i][s].replace(/\s/g, '') == value)
                result.push(i);

        return result;
    };

    return {
        style : style,

        getStyleRuleIndexBySelector : getStyleRuleIndexBySelector,

        add(prop, value){
            return style.sheet.insertRule(`${prop}{${value}}`, style.sheet.cssRules.length);
        },

        remove(selector, prop){
            var indexes = getStyleRuleIndexBySelector(selector, prop), i = indexes.length;
            // reversed iteration so indexes won't change after deletion for each iteration
            for( ; i-- ; )
                style.sheet.deleteRule( indexes[i] );
        }
    }
})();
//Set Menu Style
setStyleTag()
function setStyleTag()
{
    if(document.querySelector("div[data-style-read]"))
    document.querySelectorAll("div[data-style-read]").forEach(function (div) {

        let styleHead = div.getAttribute("data-style-read").split("[#]")
        let styleCode = div.getAttribute("data-style-code").split("[#]")
        let index = 0
        styleHead.forEach(function (head){
            if(head.replace(/\s+/,"")!==""){
                styleManager.add(head,styleCode[index])
                index++
            }
        })
    })
}
if(document.querySelector("#myTopnav"))
document.querySelector("#myTopnav").querySelectorAll("a").forEach(function (el) {
    if(el.getAttribute("data-link"))
        el.setAttribute("href","/"+el.getAttribute("data-link"))
})
if(document.querySelector('div.blocks'))

document.querySelectorAll(".blocks").forEach(function (el) {
    el.removeAttribute("data-style")
    el.removeAttribute("data-style-read")
    el.removeAttribute("data-style-code")

    el.querySelectorAll('.paste').forEach(function (div) {
        div.removeAttribute("data-style")
        div.removeAttribute("data-style-read")
        div.removeAttribute("data-style-code")
        div.querySelectorAll(".sub").forEach(function (sub) {
            sub.removeAttribute("data-style")
            sub.removeAttribute("data-style-read")
            sub.removeAttribute("data-style-code")
        })
    })
})

document.querySelectorAll("*[contenteditable='true']").forEach(function (el) {
    el.removeAttribute("contenteditable")
})
