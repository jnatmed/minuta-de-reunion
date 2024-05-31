<?php require("parts/head.view.php") ?>

<body>


<header>
    <?php require("parts/nav.view.php") ?>
    <h1>Resultados de Búsqueda</h1>
</header>

<h2>Resultados de la Búsqueda</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>OrgName</th>
            <th>Meeting Title</th>
            <th>Meeting Date</th>
            <th>Meeting Time</th>
            <th>Ver</th>
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
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
