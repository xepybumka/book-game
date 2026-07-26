import DiceBox from "@3d-dice/dice-box";

let diceBox = new DiceBox({
    assetPath: "/assets/",
    container: "#dice-box",
    offscreen: true,
    scale: 20,
    throwForce: 2,
    gravity: 1,
    mass: 1,
    spinForce: 3,
});

diceBox.init()

const button = document.getElementById("dice_roll");
button.addEventListener("click", (e) => {
    diceBox.roll("2d6");
    diceBox.onRollComplete = (rollResult) => console.log(rollResult[0].value);
});
