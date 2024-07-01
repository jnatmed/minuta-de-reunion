<?php require("parts/head.view.php") ?>

<body>

<header>
    <?php require("parts/nav.view.php") ?>
    <h1>Resultados de Búsqueda</h1>
</header>

<main>

    <h2>Resultados de la Búsqueda</h2>
    
    <table class="table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Organismo</th>
                <th>Título Meeting</th>
                <th>Fecha Meeting</th>
                <th>Hora Meeting</th>
                <th>Ver</th>
                <th>Baja</th>
                <th>Modificación</th>
                <th>Ver Archivo</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td data-label="ID"><?= htmlspecialchars($row['id']) ?></td>
                    <td data-label="Nombre Organismo"><?= htmlspecialchars($row['orgName']) ?></td>
                    <td data-label="Título Meeting"><?= htmlspecialchars($row['meetingTitle']) ?></td>
                    <td data-label="Fecha Meeting"><?= htmlspecialchars($row['meetingDate']) ?></td>
                    <td data-label="Hora Meeting"><?= htmlspecialchars($row['meetingTime']) ?></td>
                    <td data-label="Ver"><a href="/ver.php?id_meeting=<?= htmlspecialchars($row['id']) ?>" target="_blank">Ver</a></td>
                    <td data-label="Baja"><a href="/baja.php?id_meeting=<?= htmlspecialchars($row['id']) ?>" target="_blank">Eliminar</a></td>
                    <td data-label="Modificación"><a href="/update.php?id_meeting=<?= htmlspecialchars($row['id']) ?>" target="_blank">Modificar</a></td>
                    <td data-label="Ver Archivo">
                        <?php if (!empty($row['documentPath'])): ?>
                            <a href="/get-minuta.php?id_meeting=<?= htmlspecialchars($row['id']) ?>" target="_blank">Descargar</a>
                        <?php else: ?>
                            Sin archivo aún
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="#top" id="scrollLink" class="sticky-link"></a>
</main>

</body>
</html>
