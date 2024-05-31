<?php require("parts/head.view.php") ?>

<body>


    <header>
        <?php require("parts/nav.view.php") ?>
        <h1>Minuta de Reunión</h1>
    </header>
    
    <main>

            <section>
                <p><strong>Nombre de la Organización:</strong> <?= $orgName; ?></p>
                <p><strong>Título de la Reunión:</strong> <?= $meetingTitle; ?></p>
                <p><strong>Fecha:</strong> <?= $meetingDate; ?></p>
                <p><strong>Hora:</strong> <?= $meetingTime; ?></p>
                <p><strong>Lugar:</strong> <?= $meetingPlace; ?></p>
                <p><strong>Facilitador:</strong> <?= $facilitator; ?></p>
                <p><strong>Secretario:</strong> <?= $secretary; ?></p>
                <h2>Lista de Asistentes</h2>
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
                                    <?php foreach (explode(',', $attendees) as $attendee) : ?>
                                        <li> <?= trim($attendee)?>  </li>
                                    <?php endforeach ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php foreach (explode(',', $absentees) as $absentee): ?>
                                        <li>  <?= trim($absentee); ?> </li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <?php foreach (explode(',', $guests) as $guest) : ?>
                                            <li> <?= trim($guest) ?> </li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        
            <section>
                <h2>Orden del Día</h2>
                <ol>
                    <?php foreach (explode("\n", $agenda) as $item)  : ?>
                        <li> <?= trim($item) ?>. </li>
                    <?php endforeach; ?>
                </ol>
            </section>
        
            <section>
                <h2>Desarrollo de la Reunión</h2>
                <p><?= nl2br($discussion); ?></p>
            </section>
        
            <section>
                <h2>Temas Nuevos</h2>
                <p><?= nl2br($newTopics); ?></p>
            </section>
        
            <section>
                <h2>Próxima Reunión</h2>
                <p><?= $nextMeeting; ?></p>
            </section>
        
            <footer>
                <h2>Clausura</h2>
                <p><strong>Hora de finalización:</strong> <?= $closingTime; ?></p>
                <p><strong>Palabras finales:</strong> <?= nl2br($closingRemarks); ?></p>
            </footer>
    </main>

</body>
</html>