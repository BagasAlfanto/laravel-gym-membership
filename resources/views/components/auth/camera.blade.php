<div>
    <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Ambil Selfie</label>
    <div id="cameraContainer" class="mb-2">
        <video id="video" autoplay playsinline class="w-full rounded mb-2 mt-2"></video>
        <button type="button" id="captureBtn"
            class="w-full py-2 px-4 bg-indigo-500 text-white rounded hover:bg-indigo-600">Ambil Selfie</button>
    </div>
    <canvas id="canvas" class="hidden"></canvas>
    <input type="hidden" name="photo" id="photoInput">
    <div id="previewContainer" class="hidden">
        <img id="preview" class="w-full rounded mt-2" alt="Preview">
        <div class="flex gap-2 mt-2">
            <button type="button" id="retakeBtn"
                class="w-1/2 py-2 px-4 bg-gray-400 text-white rounded hover:bg-gray-500">Ambil Ulang</button>
        </div>
    </div>
    <small class="text-gray-500 block mt-2">Izinkan akses kamera dan selfie untuk upload gambar.</small>
</div>
