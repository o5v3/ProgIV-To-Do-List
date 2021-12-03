function showResult(data, operation) {
    if (true) {
        //Modal Success
    } else {
        //Modal Fail
    }
}

async function makeRequest(data, operation) {
    $.get(window.location.href, data, data => showResult(data, operation));
}

function changeView(view) {
    $("#main").load(window.location.href, {"action" : view});
}

function makeCards(user_id, action) {
    $.getJSON(window.location.href, {"action" : action}, showCards);
}

function showCards(data) {
    
}

function successOrFailModal(title, operation) {
    Swail.fire({
        title: ""
    })
}
