'use strict';

const textWriter = (()=>{

const intro = document.querySelector('.intro');

const arr = [];
let value = intro.firstChild.nodeValue;
let current = 0;
let intervalTime = 0;

const text = () =>{
  for (let i = 0, len = value.length; i < len; i++){
    arr.push(value.charAt(i));
  }

  intro.firstChild.nodeValue = '';

  const textWriter = () =>{
  intro.firstChild.nodeValue += arr[current];
  current++;
    if (current === arr.length){
      clearInterval(duration);
    }

  };

const duration = setInterval(textWriter, intervalTime);
};

const loadFunction = (callback) =>{
  if (addEventListener){
  window.addEventListener('load', callback, false);
  }
};

return {
  init: (time) =>{
    intervalTime = time;
    loadFunction(text);
  }
};

})();

textWriter.init(100);
