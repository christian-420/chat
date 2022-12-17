/**************** Chat  ***************************/
const openButton = document.querySelector(".open-button");
const chat = document.querySelector(".chat-popup");


openButton.addEventListener("click", function () {
	chat.classList.toggle("chat-show");
	openButton.classList.toggle("bg-color");
});

const title = document.querySelector(".demo");
const txt = "BomboChat";

function typeWriter(word, index) {
	if (index < word.length) {
		setTimeout(() => {
			title.innerHTML += `<span>${word[index]}</span>`
			typeWriter(txt, index + 1)
		}, 300)
	}
}

setTimeout(() => {
	typeWriter(txt, 0)
}, 800);
