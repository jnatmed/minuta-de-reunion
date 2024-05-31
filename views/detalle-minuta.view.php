<?php require("parts/head.view.php") ?>

<body>


<header>
    <?php require("parts/nav.view.php") ?>
    <h1>Minuta de Reunión</h1>
</header>

<main>

        <section>
            <p><strong>Nombre de la Organización:</strong> <?= htmlspecialchars($meetingDetails['orgName']); ?></p>
            <p><strong>Título de la Reunión:</strong> <?= htmlspecialchars($meetingDetails['meetingTitle']); ?></p>
            <p><strong>Fecha:</strong> <?= htmlspecialchars($meetingDetails['meetingDate']); ?></p>
            <p><strong>Hora:</strong> <?= htmlspecialchars($meetingDetails['meetingTime']); ?></p>
            <p><strong>Lugar:</strong> <?= htmlspecialchars($meetingDetails['meetingPlace']); ?></p>
            <p><strong>Facilitador:</strong> <?= htmlspecialchars($meetingDetails['facilitator']); ?></p>
            <p><strong>Secretario:</strong> <?= htmlspecialchars($meetingDetails['secretary']); ?></p>
            <h2 class="titulo-detalles">Lista de Asistentes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Presentes</th>
                        <th>Ausentes</th>
                        <th>Invitados</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <ul>
                                <?php foreach (explode(',', $meetingDetails['attendees']) as $attendee) : ?>
                                    <li><?= htmlspecialchars(trim($attendee)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <?php foreach (explode(',', $meetingDetails['absentees']) as $absentee): ?>
                                    <li><?= htmlspecialchars(trim($absentee)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <?php foreach (explode(',', $meetingDetails['guests']) as $guest) : ?>
                                    <li><?= htmlspecialchars(trim($guest)); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        
        <section>
            <h2 class="titulo-detalles">Orden del Día</h2>
            <ol>
                <?php foreach (explode("\n", $meetingDetails['agenda']) as $item)  : ?>
                    <li><?= htmlspecialchars(trim($item)); ?>.</li>
                <?php endforeach; ?>
            </ol>
        </section>
        
        <section>
            <h2 class="titulo-detalles">Desarrollo de la Reunión</h2>
            <p><?= nl2br(htmlspecialchars($meetingDetails['discussion'])); ?></p>
        </section>
        
        <section>
            <h2 class="titulo-detalles">Temas Nuevos</h2>
            <p><?= nl2br(htmlspecialchars($meetingDetails['newTopics'])); ?></p>
        </section>
        
        <section>
            <h2 class="titulo-detalles">Próxima Reunión</h2>
            <p><?= htmlspecialchars($meetingDetails['nextMeeting']); ?></p>
        </section>
        
        <footer>
            <h2 class="titulo-detalles">Clausura</h2>
            <p><strong>Hora de finalización:</strong> <?= htmlspecialchars($meetingDetails['closingTime']); ?></p>
            <p><strong>Palabras finales:</strong> <?= nl2br(htmlspecialchars($meetingDetails['closingRemarks'])); ?></p>
        </footer>
</main>

</body>
</html>
