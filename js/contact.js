function ask() {
    var msg1 = "Reason for contact:\n- JOB\n- SUPPORT\n- FEEDBACK\n- PARTNERSHIP\n- OTHER";
    var reason = prompt(msg1);
    if (!reason) {
        alert("No input provided. Goodbye!");
        return;
    }
    reason = reason.trim().toUpperCase();

    if (reason === "JOB") {
        var msg2 = "Which type of job are you interested in?\n- Software Developer\n- UI/UX Designer\n- Data Analyst\n- Database Administrator";
        var jobType = prompt(msg2);
        if (jobType) {
            jobType = jobType.trim();
            alert("Thank you for your interest in a " + jobType + " position! Please send your resume.");
        } else {
            alert("No job type provided.");
        }
    } else if (reason === "SUPPORT") {
        var msg3 = "What type of support do you need?\n- Technical\n- Billing\n- General Inquiry";
        var supportType = prompt(msg3);
        if (supportType) {
            supportType = supportType.trim().toUpperCase();
            if (supportType === "TECHNICAL") {
                alert("Please visit our technical support page.");
            } else if (supportType === "BILLING") {
                alert("For billing inquiries, please contact billing@company.com.");
            } else if (supportType === "GENERAL INQUIRY") {
                alert("For general inquiries, please contact info@company.com.");
            } else {
                alert("Support type not recognized. Please visit our support page.");
            }
        } else {
            alert("No support type provided.");
        }
    } else if (reason === "FEEDBACK") {
        var msg4 = "Please provide your feedback:";
        var feedback = prompt(msg4);
        if (feedback) {
            alert("Thank you for your feedback! We value your input.");
        } else {
            alert("No feedback provided.");
        }
    } else if (reason === "PARTNERSHIP") {
        var msg5 = "What type of partnership are you interested in?\n- Business Collaboration\n- Affiliate\n- Sponsorship\n- Other";
        var partnershipType = prompt(msg5);
        if (partnershipType) {
            partnershipType = partnershipType.trim();
            alert("Thank you for your interest in a partnership (" + partnershipType + "). Please email partnerships@company.com with your proposal.");
        } else {
            alert("No partnership type provided.");
        }
    } else if (reason === "OTHER") {
        var msg7 = "Please describe your reason for contacting us.";
        var otherReason = prompt(msg7);
        alert("Thank you for reaching out. We will review your message.");
    } else {
        alert("Thank you for your message!");
    }
}
ask();