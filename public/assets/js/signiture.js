const canvas = document.getElementById("signatureCanvas");
const ctx = canvas.getContext("2d");
let drawing = false;

const canvasRect = canvas.getBoundingClientRect();
const scale = {
  x: canvas.width / canvasRect.width,
  y: canvas.height / canvasRect.height,
};

canvas.addEventListener("mousedown", () => {
  drawing = true;
  ctx.beginPath();
});

canvas.addEventListener("mouseup", () => {
  drawing = false;
  ctx.closePath();
  saveSignatureData();
});

canvas.addEventListener("mousemove", draw);

function draw(e) {
  if (!drawing) return;
  const rect = canvas.getBoundingClientRect();
  const x = (e.clientX - rect.left) * scale.x;
  const y = (e.clientY - rect.top) * scale.y;

  ctx.lineWidth = 2;
  ctx.lineCap = "round";
  ctx.strokeStyle = "#000";
  ctx.lineTo(x, y);
  ctx.stroke();
  ctx.beginPath();
  ctx.moveTo(x, y);
}

function clearSignature() {
  ctx.clearRect(0, 0, canvas.width, canvas.height); // Menghapus tanda tangan
  document.getElementById("signatureData").value = ""; // Reset the signatureData input to an empty string
}

function saveSignatureData() {
  const signatureData = canvas.toDataURL(); // Mendapatkan data tanda tangan dalam format base64
  document.getElementById("signatureData").value = signatureData;
}

function saveSignature() {
  const signatureCanvas = document.getElementById("signatureCanvas");
  const signatureData = signatureCanvas.toDataURL(); // Mengambil gambar tanda tangan dalam bentuk data URL

  if (signatureData) {
    // Simpan data tanda tangan ke server
    const formData = new FormData();
    formData.append("signatureData", signatureData);

    // Add CSRF token to the form data
    const csrfToken = document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");
    formData.append("_token", csrfToken);

    fetch("/api/save-signature", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data.message); // Menampilkan pesan respons dari server
      })
      .catch((error) => {
        console.error("Error:", error);
      });
    // Simpan data tanda tangan ke server atau lakukan tindakan lain sesuai kebutuhan
    console.log("Data tanda tangan:", signatureData);
  } else {
    alert("Tanda tangan belum dibuat.");
  }
}
