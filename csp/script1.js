const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
const upload = document.getElementById("upload");
const colorPicker = document.getElementById("color-picker");
const brushSizeInput = document.getElementById("brush-size");
const undoButton = document.getElementById("undo");
const clearButton = document.getElementById("clear");
const downloadButton = document.getElementById("download");
const saveButton = document.getElementById("save");
const loadButton = document.getElementById("load");
const templatesButton = document.getElementById("templates-button");
const savedImagesModal = document.getElementById("saved-images-modal");
const closeModalButton = document.getElementById("close-modal");
const savedImagesContainer = document.getElementById("saved-images");
const templateLibraryModal = document.getElementById("template-library-modal");
const templateList = document.getElementById("template-list");
const closeTemplateModalButton = document.getElementById("close-template-modal");

let savedImages = JSON.parse(localStorage.getItem("savedImages")) || [];
let imgLoaded = false;
let baseImage = null;
let brushSize = 10;
let currentColor = "#ff0000";
let drawing = false;
let history = [];

// Template paths (update with your actual file paths)
const templates = [
  "http://localhost/csp/template1.jpg",
  "http://localhost/csp/template2.jpg",
  "http://localhost/csp/template3.jpg",
  "http://localhost/csp/template4.jpg",
  "http://localhost/csp/template5.jpg"
];

// Save canvas state
function saveCanvasState() {
  if (history.length > 10) history.shift();
  history.push(canvas.toDataURL());
}

// Function to draw and center the image
function drawCenteredImage(img) {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  const aspectRatio = img.width / img.height;
  const canvasAspectRatio = canvas.width / canvas.height;
  let newWidth, newHeight, xOffset, yOffset;

  if (aspectRatio > canvasAspectRatio) {
    newWidth = canvas.width;
    newHeight = newWidth / aspectRatio;
    xOffset = 0;
    yOffset = (canvas.height - newHeight) / 2;
  } else {
    newHeight = canvas.height;
    newWidth = newHeight * aspectRatio;
    xOffset = (canvas.width - newWidth) / 2;
    yOffset = 0;
  }

  ctx.drawImage(img, xOffset, yOffset, newWidth, newHeight);

  imgLoaded = true;
  baseImage = canvas.toDataURL();
  history = [baseImage];
}

// Handle file upload
upload.addEventListener("change", (event) => {
  const file = event.target.files[0];
  if (file) {
    const img = new Image();
    const reader = new FileReader();

    reader.onload = (e) => {
      img.onload = () => drawCenteredImage(img);
      img.src = e.target.result;
    };
    reader.readAsDataURL(file);
  } else {
    alert("Failed to load the image.");
  }
});

// Brush size and color
brushSizeInput.addEventListener("input", (event) => (brushSize = event.target.value));
colorPicker.addEventListener("input", (event) => (currentColor = event.target.value));

// Drawing
canvas.addEventListener("mousedown", (event) => {
  if (!imgLoaded) {
    alert("Please upload or load an image first.");
    return;
  }
  saveCanvasState();
  drawing = true;
  draw(event);
});

canvas.addEventListener("mousemove", (event) => drawing && draw(event));
canvas.addEventListener("mouseup", () => (drawing = false));
canvas.addEventListener("mouseleave", () => (drawing = false));

function draw(event) {
  const rect = canvas.getBoundingClientRect();
  const x = event.clientX - rect.left;
  const y = event.clientY - rect.top;
  ctx.beginPath();
  ctx.arc(x, y, brushSize / 2, 0, Math.PI * 2);
  ctx.fillStyle = currentColor;
  ctx.fill();
}

// Clear and undo
clearButton.addEventListener("click", () => {
  if (!imgLoaded) return alert("Please upload or load an image first.");
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  const img = new Image();
  img.src = baseImage;
  img.onload = () => ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
  history = [baseImage];
});

undoButton.addEventListener("click", () => {
  if (history.length > 1) {
    history.pop();
    const previousState = history[history.length - 1];
    const img = new Image();
    img.src = previousState;
    img.onload = () => {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
    };
  } else {
    alert("No more actions to undo.");
  }
});

// Download
downloadButton.addEventListener("click", () => {
  const link = document.createElement("a");
  link.download = "kalamcolor-art.png";
  link.href = canvas.toDataURL("image/png");
  link.click();
});

// Save and load
saveButton.addEventListener("click", () => {
  const canvasData = canvas.toDataURL("image/png");
  savedImages.push(canvasData);
  localStorage.setItem("savedImages", JSON.stringify(savedImages));
  alert("Artwork saved!");
  loadSavedImages();
});

loadButton.addEventListener("click", () => {
  if (savedImages.length === 0) return alert("No saved images.");
  savedImagesModal.classList.remove("hidden");
  loadSavedImages();
});

closeModalButton.addEventListener("click", () => savedImagesModal.classList.add("hidden"));

function loadSavedImages() {
  savedImagesContainer.innerHTML = ""; // Clear the container
  savedImages.forEach((imageData, index) => {
    const imageContainer = document.createElement("div");
    imageContainer.classList.add("image-container");

    // Create image element
    const img = document.createElement("img");
    img.src = imageData;
    img.onclick = () => loadImage(imageData);

    // Create delete button
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Delete";
    deleteButton.onclick = () => deleteSavedImage(index);

    // Append elements to the container
    imageContainer.appendChild(img);
    imageContainer.appendChild(deleteButton);

    // Append the container to the modal
    savedImagesContainer.appendChild(imageContainer);
  });
}


function deleteSavedImage(index) {
  if (confirm("Are you sure you want to delete this saved image?")) {
    savedImages.splice(index, 1);
    localStorage.setItem("savedImages", JSON.stringify(savedImages));
    loadSavedImages();
    alert("Image deleted successfully!");
  }
}

function loadImage(imageData) {
  const img = new Image();
  img.src = imageData;
  img.onload = () => {
    saveCanvasState();
    drawCenteredImage(img);
    savedImagesModal.classList.add("hidden");
  };
}

// Templates
templatesButton.addEventListener("click", () => {
  templateLibraryModal.classList.remove("hidden");
  loadTemplates();
});

closeTemplateModalButton.addEventListener("click", () => templateLibraryModal.classList.add("hidden"));

function loadTemplates() {
  templateList.innerHTML = ""; // Clear the container
  templates.forEach((template) => {
    const imageContainer = document.createElement("div");
    imageContainer.classList.add("image-container");

    // Create image element
    const img = document.createElement("img");
    img.src = template;
    img.onclick = () => loadTemplate(template);

    // Append image to the container
    imageContainer.appendChild(img);

    // Append the container to the modal
    templateList.appendChild(imageContainer);
  });
}


function loadTemplate(template) {
  const img = new Image();
  img.onload = () => {
    saveCanvasState();
    drawCenteredImage(img);
    templateLibraryModal.classList.add("hidden");
    console.log("Template loaded successfully:", template);
  };
  img.onerror = () => {
    alert("Failed to load template image. Please check the URL: " + template);
    console.error("Image load error:", template);
  };
  img.src = template;
}
