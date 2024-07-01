<form action="../process.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_meeting" value="<?= htmlspecialchars($meetingDetails['id']) ?>">
    
    <label for="orgName">Nombre de la Organización:</label>
    <input type="text" id="orgName" name="orgName" value="<?= htmlspecialchars($meetingDetails['orgName']) ?>" required>
    
    <label for="meetingTitle">Título de la Reunión:</label>
    <input type="text" id="meetingTitle" name="meetingTitle" value="<?= htmlspecialchars($meetingDetails['meetingTitle']) ?>" required>

    <label for="meetingDate">Fecha:</label>
    <input type="date" id="meetingDate" name="meetingDate" value="<?= htmlspecialchars($meetingDetails['meetingDate']) ?>" required>

    <label for="meetingTime">Hora:</label>
    <input type="time" id="meetingTime" name="meetingTime" value="<?= htmlspecialchars($meetingDetails['meetingTime']) ?>" required>

    <label for="meetingPlace">Lugar:</label>
    <input type="text" id="meetingPlace" name="meetingPlace" value="<?= htmlspecialchars($meetingDetails['meetingPlace']) ?>" required>

    <label for="facilitator">Facilitador:</label>
    <input type="text" id="facilitator" name="facilitator" value="<?= htmlspecialchars($meetingDetails['facilitator']) ?>" required>

    <label for="secretary">Secretario:</label>
    <input type="text" id="secretary" name="secretary" value="<?= htmlspecialchars($meetingDetails['secretary']) ?>" required>

    <label for="attendees">Asistentes (separados por comas):</label>
    <textarea id="attendees" name="attendees" required><?= htmlspecialchars($meetingDetails['attendees']) ?></textarea>

    <label for="absentees">Ausentes (separados por comas):</label>
    <textarea id="absentees" name="absentees"><?= htmlspecialchars($meetingDetails['absentees']) ?></textarea>

    <label for="guests">Invitados (separados por comas):</label>
    <textarea id="guests" name="guests"><?= htmlspecialchars($meetingDetails['guests']) ?></textarea>

    <label for="agenda">Orden del Día (un tema por línea):</label>
    <textarea id="agenda" name="agenda" required><?= htmlspecialchars($meetingDetails['agenda']) ?></textarea>

    <label for="discussion">Desarrollo de la Reunión:</label>
    <textarea id="discussion" name="discussion" required><?= htmlspecialchars($meetingDetails['discussion']) ?></textarea>

    <label for="newTopics">Temas Nuevos:</label>
    <textarea id="newTopics" name="newTopics"><?= htmlspecialchars($meetingDetails['newTopics']) ?></textarea>

    <label for="nextMeeting">Próxima Reunión (Fecha, hora y lugar):</label>
    <input type="text" id="nextMeeting" name="nextMeeting" value="<?= htmlspecialchars($meetingDetails['nextMeeting']) ?>" required>

    <label for="closingTime">Hora de Clausura:</label>
    <input type="time" id="closingTime" name="closingTime" value="<?= htmlspecialchars($meetingDetails['closingTime']) ?>" required>

    <label for="closingRemarks">Palabras Finales:</label>
    <textarea id="closingRemarks" name="closingRemarks" required><?= htmlspecialchars($meetingDetails['closingRemarks']) ?></textarea>
    
    <div class="drop-zone" id="drop-zone">Arrastra y suelta tu archivo aquí o haz click para subir</div>
    <input type="file" id="file-input" name="file" class="hidden" accept=".pdf,.doc,.docx">


    <button type="submit" name="action" value="<?= $action === 'update' ? 'update' : 'new' ?>">
        <?= $action === 'update' ? 'Actualizar Meeting' : 'Enviar Nuevo Formulario' ?>
    </button>
</form>