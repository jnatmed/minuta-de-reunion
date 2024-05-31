<h1>Formulario de Minuta de Reunión</h1>
    <form action="process.php" method="post">
        <label for="orgName">Nombre de la Organización:</label>
        <input type="text" id="orgName" name="orgName" required>

        <label for="meetingTitle">Título de la Reunión:</label>
        <input type="text" id="meetingTitle" name="meetingTitle" required>

        <label for="meetingDate">Fecha:</label>
        <input type="date" id="meetingDate" name="meetingDate" required>

        <label for="meetingTime">Hora:</label>
        <input type="time" id="meetingTime" name="meetingTime" required>

        <label for="meetingPlace">Lugar:</label>
        <input type="text" id="meetingPlace" name="meetingPlace" required>

        <label for="facilitator">Facilitador:</label>
        <input type="text" id="facilitator" name="facilitator" required>

        <label for="secretary">Secretario:</label>
        <input type="text" id="secretary" name="secretary" required>

        <label for="attendees">Asistentes (separados por comas):</label>
        <textarea id="attendees" name="attendees" required></textarea>

        <label for="absentees">Ausentes (separados por comas):</label>
        <textarea id="absentees" name="absentees"></textarea>

        <label for="guests">Invitados (separados por comas):</label>
        <textarea id="guests" name="guests"></textarea>

        <label for="agenda">Orden del Día (un tema por línea):</label>
        <textarea id="agenda" name="agenda" required></textarea>

        <label for="discussion">Desarrollo de la Reunión:</label>
        <textarea id="discussion" name="discussion" required></textarea>

        <label for="newTopics">Temas Nuevos:</label>
        <textarea id="newTopics" name="newTopics"></textarea>

        <label for="nextMeeting">Próxima Reunión (Fecha, hora y lugar):</label>
        <input type="text" id="nextMeeting" name="nextMeeting" required>

        <label for="closingTime">Hora de Clausura:</label>
        <input type="time" id="closingTime" name="closingTime" required>

        <label for="closingRemarks">Palabras Finales:</label>
        <textarea id="closingRemarks" name="closingRemarks" required></textarea>

        <button type="submit">Guardar Minuta</button>
    </form>