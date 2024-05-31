<?php require("parts/head.view.php") ?>

<body>


<header>
    <?php require("parts/nav.view.php") ?>
    <h1>Resultados de Búsqueda</h1>
</header>

<main>

    <h2>Resultados de la Búsqueda</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Organismo</th>
                <th>Titulo Meeting</th>
                <th>Fecha Meeting</th>
                <th>Hora Meeting</th>
                <th>Ver</th>
                <th>Baja</th>
                <th>Modificacion</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['orgName']) ?></td>
                    <td><?= htmlspecialchars($row['meetingTitle']) ?></td>
                    <td><?= htmlspecialchars($row['meetingDate']) ?></td>
                    <td><?= htmlspecialchars($row['meetingTime']) ?></td>
                    <td><a href="/ver.php?id_meeting=<?= htmlspecialchars($row['id']) ?>">Ver</a></td>
                    <td><a href="/baja.php?id_meeting=<?= htmlspecialchars($row['id']) ?>">Eliminar</a></td>
                    <td><a href="/update.php?id_meeting=<?= htmlspecialchars($row['id']) ?>">Modificar</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

</body>
</html>
