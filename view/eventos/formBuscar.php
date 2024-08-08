<form id="BusquedaHome" action="resultadosPrincipales.php" method="post" class="category-search-form">
                            
    <h3 class="widget-title">Nueva Búsqueda</h3>
    <div class="input-group stylish-input-group">
    <input type="text" name="InputEvento" placeholder="Evento" class="form-control" id="InputEvento"
        value="<?php echo (!empty($tituloEvento))? $tituloEvento: ''; ?>">
        <span class="input-group-addon">
            <button type="submit">
                <i class="flaticon-search"></i>
            </button>
        </span>
    </div>
    
    <div class="input-group">
    <select name="SelectCiudad" class="form-control" id="SelectCiudad">
        <option value="">Ciudad</option>
        <?php
        try {
            $stmt = $pdo->prepare("SELECT idciudad, ciudad FROM ciudades");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $selected = '';
                if (!empty($idCiudad) && $idCiudad ==$row['idciudad']) {
                    $selected = 'selected';
                }
                echo '<option value="' . $row['idciudad'] . '" '.$selected.'>' . $row['ciudad'] . '</option>';
            }
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        ?>
    </select>
    </div>
    <div class="input-group">
    <input type="date" name="InputFecha" placeholder="Fecha" class="form-control" id="InputFecha" 
        value="<?php echo (!empty($fechaEvento))? $fechaEvento: ''; ?>">
    </div>
    <div class="input-group">
    <select name="SelectCategoria" class="form-control">
        <option value="">Categoria</option>
        <?php
                            try {
                                $stmt = $pdo->prepare("SELECT idcategoria, categoria FROM categorias");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    $selected = '';
                                    if (!empty($idCategoria) && $idCategoria ==$row['idcategoria']) {
                                        $selected = 'selected';
                                    }
                                    echo '<option value="' . $row['idcategoria'] . '" '.$selected.'>' . $row['categoria'] . '</option>';
                                }
                            } catch (\PDOException $e) {
                                echo 'Error: ' . $e->getMessage();
                            }
                            ?>
    </select>
    </div>

    <div class="form-group mb-0">
    <button type="submit" class="item-btn">Buscar</button>
    </div>
</form>