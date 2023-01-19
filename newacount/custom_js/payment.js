var ans = false;
var amount = $price;
if (ans = confirm('You are to Pay' + ' ' + 'N' + amount + ' ' + 'Naira\\nFor Your Choice of Space\\nClick Ok to Proceed\\nOr Click Cancel To Stop The Process.')) {
  this.location += '?answer=' + ans;
  window.location = 'transact';
}
else {
  window.location = 'ust';
}