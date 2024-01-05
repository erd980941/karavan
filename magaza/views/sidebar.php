<div class="k-side-bar bg-light p-3">
    <h4 class="text-center">Kategoriler</h4>
    <?php include __DIR__.'/category-sidebar.php' ?>
    <hr>
    <h4 class="text-center">Fiyat Aralığı</h4>
    <div class="range_container mt-4">
        <div class="sliders_control">
            <input id="fromSlider" type="range" value="0" min="0" max="100" />
            <input id="toSlider" type="range" value="100" min="0" max="100" />
        </div>
        <div class="form_control">
            <input type="text" class="mt-4" id="fromInput" value="0" min="0" max="100" />
            <input type="text" style="text-align:end" class="mt-4" id="toInput" value="100" min="0" max="100" />
        </div>
    </div>
    <button class="btn btn-primary btn-block mt-3">
        Filtrele
    </button>
</div>