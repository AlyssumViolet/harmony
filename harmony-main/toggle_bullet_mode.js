
// let bulletMode = false;

// // Toggle between bullet mode and text mode
//     // function toggleBulletMode() {
//     //     bulletMode = !bulletMode;
//     //     const textarea = document.getElementById("objectives_id");
//     //     textarea.dataset.bulletMode = bulletMode;
//     //     textarea.value = formatTextAsBullets(textarea.value, bulletMode);
//     // }

//     function toggleBulletMode() {
//         bulletMode = !bulletMode;
//         const textarea = document.getElementById("objectives_id");
//         const button = event.target;
//         textarea.dataset.bulletMode = bulletMode;
//         textarea.value = formatTextAsBullets(textarea.value, bulletMode);
    
//         button.textContent = bulletMode ? "Switch to Plain Text Mode" : "Switch to Bullet Mode";
//     }

// // Automatically add bullets if in bullet mode
//     function autoBullet(textarea) {
//         if (textarea.dataset.bulletMode === "true") {
//             const lines = textarea.value.split('\n').map(line => line.trim());
//             textarea.value = lines.map(line => line.startsWith("-") ? line : `- ${line}`).join('\n');
//         }
//     }

// // Format existing text to bullets if needed
//     function formatTextAsBullets(text, bulletMode) {
//         if (bulletMode) {
//             const lines = text.split('\n').map(line => line.trim());
//             return lines.map(line => line.startsWith("-") ? line : `- ${line}`).join('\n');
//         } else {
//             return text.replace(/^- /gm, '');
//         }
//     }

let bulletMode = false;

// Toggle between bullet mode and text mode
function toggleBulletMode() {
    bulletMode = !bulletMode;
    const textarea = document.getElementById("objectives_lbl"); // Make sure this matches the HTML id
    const button = event.target;
    textarea.dataset.bulletMode = bulletMode;
    textarea.value = formatTextAsBullets(textarea.value, bulletMode);

    button.textContent = bulletMode ? "Switch to Plain Text Mode" : "Switch to Bullet Mode";
}

// Automatically add bullets if in bullet mode
function autoBullet(textarea) {
    if (textarea.dataset.bulletMode === "true") {
        const lines = textarea.value.split('\n').map(line => line.trim());
        textarea.value = lines.map(line => line.startsWith("-") ? line : `- ${line}`).join('\n');
    }
}

// Format existing text to bullets if needed
function formatTextAsBullets(text, bulletMode) {
    if (bulletMode) {
        const lines = text.split('\n').map(line => line.trim());
        return lines.map(line => line.startsWith("-") ? line : `- ${line}`).join('\n');
    } else {
        return text.replace(/^- /gm, '');
    }
}
