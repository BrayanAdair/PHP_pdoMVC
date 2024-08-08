<form id="BusquedaHome" action="resultadosPrincipales.php" method="post" class="category-search-form">
    <ul class="form-items">
        <li>
        <div class="input-group stylish-input-group">
            <input type="text" name="InputEvento" placeholder="Evento" class="form-control" id="InputEvento">
        </div>
        </li>
        <li>
        <div class="input-group stylish-select-group">
            <select name="SelectCiudad" class="form-control" id="SelectCiudad" required>
            <option value="">Ciudad</option>
            <?php
                try {
                    $stmt = $pdo->prepare("SELECT idciudad, ciudad FROM ciudades");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option value="' . $row['idciudad'] . '">' . $row['ciudad'] . '</option>';
                    }
                } catch (\PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                ?>
            </select>
        </div>
        </li>
        <li>
        <div class="input-group stylish-input-group">
            <input type="date" name="InputFecha" placeholder="dd/mm/aaa" class="form-control" id="InputFecha">
        </div>
        </li>
        <li>
        <div class="input-group stylish-input-group">
            <select name="SelectCategoria" class="form-control">
            <option value="">Categoria</option>
            <?php
                try {
                    $stmt = $pdo->prepare("SELECT idcategoria, categoria FROM categorias");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        echo '<option value="' . $row['idcategoria'] . '">' . $row['categoria'] . '</option>';
                    }
                } catch (\PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
                ?>
            </select>
        </div>
        </li>
        <li>
        <div class="form-group mb-0">
            <button type="submit" class="item-btn">Buscar</button>
        </div>
        </li>
    </ul>
</form>