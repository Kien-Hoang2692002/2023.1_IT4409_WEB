function palindrome(str) {
  str = str.replace(/[^a-zA-Z0-9]/g, "").toLowerCase();

  return str === str.split("").reverse().join("");
}

palindrome("eye");
