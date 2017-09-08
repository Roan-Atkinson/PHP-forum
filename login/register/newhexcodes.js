var randHex = function(len) {
  var maxlen = 8,
      min = Math.pow(16,Math.min(len,maxlen)-1)
      max = Math.pow(16,Math.min(len,maxlen)) - 1,
      n   = Math.floor( Math.random() * (max-min+1) ) + min,
      r   = n.toString(16);
  while ( r.length < len ) {
     r = r + randHex( len - maxlen );
  }
  return r;
};

for(var j = 0;j<50;j++) {
  var result = randHex(10);
  result = result[0] + result[1] + " " + result[2] + result[3] + " " + result[4] + result[5] + " " + result[6] + result[7] + " " + result[9] + result[9];
  document.write(result + "<br>");
}
