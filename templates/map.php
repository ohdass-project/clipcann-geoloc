    <div class="form-group">
        <p>Entrer le code postal pour localiser des magasins</p>
        <input type="text" name="citycode" placeholder="Ex: 75012" id="citycode" required>
        <br>
        <p id="err" style="color:red"></p>
        <button id="coord" onclick="getCoord()">Rechercher</button>
    </div>
<div id="map" style="height:350px; width=550px;"></div>