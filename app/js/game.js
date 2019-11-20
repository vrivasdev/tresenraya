const URL = window.location.href

$(document).ready(() => {
    updateUser('blue')
    let game_id = Math.floor(Math.random() * 1000);

    $('img').click((event) =>  {
        let $img = $(event.target)
        let pieze = $img.data('pieze')
        let user = $('#user').data('user')

        if(pieze === 'empty') {
            updatePieze($img, user)
            updateUser(user)
            saveAction(
                user,
                createMatrix(
                    $('#table'), 
                    $img.data('row'), 
                    $img.data('col'), $img.attr('src')
                ), 
                game_id
            )
        }
    })
});

const createMatrix = ($table) => {
    let matrix = []
    let arrayRow = []
    let i = 0

    $table.find('.element').each((j, img) => {
        if ($(img).attr('src')) {
            arrayRow.push($(img).attr('src').match(/images\/(\w+).png/)[1])
        }
        if (j === 2 || j === 5 || j ===8) {
            matrix[i++] = arrayRow
            arrayRow = []
        }    
    })
    return matrix
}

const updatePieze = ($element, user) => {
    let pieze = user === 'blue'? 'o' : 'x'
    $element.attr('src', `images/${pieze}.png`)
    $element.data('pieze', pieze)
}

const saveAction = (user, matrix = [[]], game_id) => {
    fetch(`${URL}/control/ctl_game.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body:JSON.stringify({
            action:'createMovement',
            user: user,
            matrix: matrix,
            game_id: game_id
        })
    })
    .then(response => response.json())
    .then(data => { 
        if (data.status==='win') {
            alert(`${data.user.toUpperCase()} Wins! ${data.type.toUpperCase()} match`)
            location.reload()
        } 
    })
}

const updateUser = (color) => {
    let user = color === 'red' ? 'blue' : 'red'
    $('#user').data('user', user)
    $('#user').html(user.toUpperCase())
}