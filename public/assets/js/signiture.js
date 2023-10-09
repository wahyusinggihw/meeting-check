const canvas = document.getElementById('signatureCanvas');
const ctx = canvas.getContext('2d');
let drawing = false;

const canvasRect = canvas.getBoundingClientRect();
const scale = {
  x: canvas.width / canvasRect.width,
  y: canvas.height / canvasRect.height
};

canvas.addEventListener('mousedown', () => {
  drawing = true;
  ctx.beginPath();
});

canvas.addEventListener('mouseup', () => {
  drawing = false;
  ctx.closePath();
  saveSignatureData();
});

canvas.addEventListener('mousemove', draw);

function draw(e) {
  if (!drawing) return;
  const rect = canvas.getBoundingClientRect();
  const x = (e.clientX - rect.left) * scale.x;
  const y = (e.clientY - rect.top) * scale.y;

  ctx.lineWidth = 2;
  ctx.lineCap = 'round';
  ctx.strokeStyle = '#000';
  ctx.lineTo(x, y);
  ctx.stroke();
  ctx.beginPath();
  ctx.moveTo(x, y);
}

function saveSignatureData() {
  const signatureData = canvas.toDataURL(); // Mendapatkan data tanda tangan dalam format base64
  document.getElementById('signatureData').value = signatureData;
}

function saveSignature() {
  const signatureData = document.getElementById('signatureData').value;
  if (signatureData) {
    // Simpan data tanda tangan ke server atau lakukan tindakan lain sesuai kebutuhan
    console.log('Data tanda tangan:', signatureData);
  } else {
    alert('Tanda tangan belum dibuat.');
  }
}

function clearSignature() {
  ctx.clearRect(0, 0, canvas.width, canvas.height); // Menghapus tanda tangan
}
