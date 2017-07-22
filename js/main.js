function laufCounter(kilometer) {
    if (kilometer === 3) {
        $.ajax({
            type: 'POST',
            data: {},
            url: 'Helper/count-rounds.php?kilometer=3',
            success: function (data) {
                bootbox.confirm({
                    title: "3 Kilometer wurden hinzugefügt!",
                    message: "Bist du damit einverstanden oder soll der Schritt rückgängig gemacht werden?",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Rückgängig machen'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Bestätigen'
                        }
                    },
                    callback: function (result) {
                        if (result === true) {
                            location.reload();
                        } else
                        {
                            threeRoundsBack(result);
                        }
                    }
                });
            },
            error: function (xhr) {
                alert(error);
            }
        });
    }
    else if (kilometer === 5) {
        $.ajax({
            type: 'POST',
            data: {},
            url: 'Helper/count-rounds.php?kilometer=5',
            success: function (data) {
                bootbox.confirm({
                    title: "5 Kilometer wurden hinzugefügt!",
                    message: "Bist du damit einverstanden oder soll der Schritt rückgängig gemacht werden?",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Rückgängig machen'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Bestätigen'
                        }
                    },
                    callback: function (result) {
                        if (result === true) {
                            location.reload();
                        } else
                        {
                            fiveRoundsBack(result);
                        }
                    }
                });
            },
            error: function (xhr) {
                alert(error);
            }
        });
    }
}
function resetHard(reset) {
    $.ajax({
        type: 'POST',
        data: {},
        url: 'Helper/count-rounds.php?reset=1',
        success: function (data) {
            alert('Datenbank wurde zurückgesetzt.');
        },
        error: function (xhr) {
            alert(error);
        }
    });
}

function threeRoundsBack(result) {
    if (result === false) {
        $.ajax({
            type: 'POST',
            data: {},
            url: 'Helper/count-rounds.php?round-back=3',
            success: function (data) {
                alert('3 Runden wurden abgezogen');
            },
            error: function (xhr) {
                alert(error);
            }
        });
    }
}
function fiveRoundsBack(result) {
    if (result === false) {
        $.ajax({
            type: 'POST',
            data: {},
            url: 'Helper/count-rounds.php?round-back=5',
            success: function (data) {
                alert('5 Runden wurden abgezogen');
            },
            error: function (xhr) {
                alert(error);
            }
        });
    }
}


jQuery.ajax({
    url: "http://weltumreiser.de/lauf/api.php/counter?transform=1",
    type: "GET",
    contentType: 'application/json; charset=utf-8',

    success: function (resultData) {
        console.log(resultData);
        document.getElementById("aktueller-stand").innerHTML = JSON.stringify(resultData['counter'][0]['total'], undefined, 2) + ' Kilometer';
        document.getElementById("fehlender-kilometer").innerHTML = JSON.stringify(resultData['counter'][0]['missing'], undefined, 2) + ' Kilometer';
        document.getElementById("drei-kilometer").innerHTML = JSON.stringify(resultData['counter'][0]['drei'], undefined, 2) + ' Mal';
        document.getElementById("fuenf-kilometer").innerHTML = JSON.stringify(resultData['counter'][0]['fuenf'], undefined, 2) + ' Mal';
    },
    error: function (jqXHR, textStatus, errorThrown) {
    },

    timeout: 120000
});