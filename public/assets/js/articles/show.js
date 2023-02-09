const $content = document.querySelector(".article-text");

let articleTextContent = $content.textContent;

console.log(articleTextContent);

articleTextContent = articleTextContent.replaceAll(/#(.*?)#/g, "<h2>$1</h2>");

articleTextContent = articleTextContent.replaceAll(/(.+\n)/g, "$1</p>");

$content.innerHTML = articleTextContent;