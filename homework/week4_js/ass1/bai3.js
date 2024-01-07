function rot13(str) {
  return str.replace(/[A-Z]/g, (char) => {
    // Dịch chuyển 13 vị trí trong bảng chữ cái
    const charCode = char.charCodeAt(0);
    const baseCharCode =
      char >= "A" && char <= "Z" ? "A".charCodeAt(0) : "a".charCodeAt(0);
    const decodedCharCode =
      ((charCode - baseCharCode + 13) % 26) + baseCharCode;

    return String.fromCharCode(decodedCharCode);
  });
}

rot13("SERR PBQR PNZC");
