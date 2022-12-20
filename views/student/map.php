<div class="container px-4">
    <div class="row gx-5">
        <div class="col map-col">
            <div class="row pb-3">
                <h3>Hogyan találj meg minket?</h3>
            </div>
            <div class="row">
                <div class="col" id="map"></div>
            </div>

        </div>
        <div class="col message-container">
            <h3>Üzenj nekünk !</h3>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Név</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Családnév Keresztnév">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email cim</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Itt a helye az üzenetnek</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <input type="submit" value="Küldés" class="btn btn-outline-dark kuldes-btn" />
            </div>
        </div>
    </div>
</div>

<script src="../../assets/JS/googleMap.js"></script>

<!-- Google Maps API -->
<script async src="https://maps.googleapis.com/maps/api/js?key=<?php print $_ENV['GOOGLE_MAP_API'] ;?>&callback=initMap">
</script>