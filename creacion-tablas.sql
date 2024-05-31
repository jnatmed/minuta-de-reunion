CREATE TABLE minutas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    orgName VARCHAR(255),
    meetingTitle VARCHAR(255),
    meetingDate DATE,
    meetingTime TIME,
    meetingPlace VARCHAR(255),
    facilitator VARCHAR(255),
    secretary VARCHAR(255),
    attendees TEXT,
    absentees TEXT,
    guests TEXT,
    agenda TEXT,
    discussion TEXT,
    newTopics TEXT,
    nextMeeting TEXT,
    closingTime TIME,
    closingRemarks TEXT
);