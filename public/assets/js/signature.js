const wrapper = document.getElementById("signature-pad");
const canvas = wrapper.querySelector("canvas");
const signaturePad = new SignaturePad(canvas, {
  // penColor: "rgb(66, 133, 244)"
});

function resizeCanvas() {
  // When zoomed out to less than 100%, for some very strange reason,
  // some browsers report devicePixelRatio as less than 1
  // and only part of the canvas is cleared then.
  const ratio = Math.max(window.devicePixelRatio || 1, 1);

  // This part causes the canvas to be cleared
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);
  signaturePad.fromData(signaturePad.toData());
}

window.onresize = resizeCanvas;
resizeCanvas();

const clearButton = document.getElementById("clearButton");
signaturePad.addEventListener(
  "endStroke",
  () => {
    saveSignatureData();
    console.log(document.getElementById("signatureData").value);
  },
  {
    once: false,
  }
);

clearButton.addEventListener("click", clearSignature);

function clearSignature() {
  signaturePad.clear();
  document.getElementById("signatureData").value = "";
}

function saveSignatureData() {
  const signatureData = signaturePad.toDataURL(); // Mendapatkan data tanda tangan dalam format base64
  document.getElementById("signatureData").value = signatureData;
}
