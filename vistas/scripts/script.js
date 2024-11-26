//var res = document.querySelector('#res');

function zero() {
    //res.textContent += '0'
    document.getElementById("codigo_persona").value += 0;
}

function one() {
    document.getElementById("codigo_persona").value += 1;
}

function two() {
    document.getElementById("codigo_persona").value += 2;
}

function three() {
    document.getElementById("codigo_persona").value += 3;
}

function four() {
    document.getElementById("codigo_persona").value += 4;
}

function five() {
    document.getElementById("codigo_persona").value += 5;
}

function six() {
    document.getElementById("codigo_persona").value += 6;
}

function seven() {
    document.getElementById("codigo_persona").value += 7;
}

function eight() {
    document.getElementById("codigo_persona").value += 8;
}

function nine(){
    document.getElementById("codigo_persona").value += 9;
}

function backspace() {
    var res1 = document.getElementById("codigo_persona").value
    
    document.getElementById('codigo_persona').value = res1.substring(0, res1.length - 1)
}



function Q() {
    res.textContent += 'q'
   
}

function W() {
    res.textContent += 'w'
}

function E() {
    res.textContent += 'e'
}

function R() {
    res.textContent += 'r'
}

function T() {
    res.textContent += 't'
}

function Y() {
    res.textContent += 'y'
}

function U() {
    res.textContent += 'u'
}

function I() {
    res.textContent += 'i'
}

function O() {
    res.textContent += 'o'
}

function P() {
    res.textContent += 'p'
}

function A() {
    res.textContent += 'a'
}

function S() {
    res.textContent += 's'
}

function D() {
    res.textContent += 'd'
}

function F() {
    res.textContent += 'f'
}
function G() {
    res.textContent += 'f'
}

function H() {
    res.textContent += 'h'
}

function J() {
    res.textContent += 'j'
}

function K() {
    res.textContent += 'k'
}

function L() {
    res.textContent += 'l'
}

function Ç() {
    res.textContent += 'ç'
}

function Z() {
    res.textContent += 'z'
}

function X() {
    res.textContent += 'x'
}

function C() {
    res.textContent += 'c'
}

function V() {
    res.textContent += 'v'
}

function B() {
    res.textContent += 'b'
}

function N() {
    res.textContent += 'n'
}

function M() {
    res.textContent += 'm'
}

function acento() {
    res.textContent += '´'
}

function abrirChave() {
    res.textContent += '{' 
}

function fecharChave() {
    res.textContent += '}'
}

function abrirColchete() {
    res.textContent += '['
}

function fecharColchete() {
    res.textContent += ']'
}

function underline() {
    res.textContent += '_'
}

function menos() {
    res.textContent += '-'
}

function mais() {
    res.textContent += '+'
}

function igual() {
    res.textContent += '='
}

function interrogação() {
    res.textContent += '?'
}

function barra() {
    res.textContent += '|'
}

function barraR() {
    res.textContent += '/'
}

function tio() {
    res.textContent += '^'
}

function doisPontos() {
    res.textContent += ':'
}

function maior() {
    res.textContent += '<'
}

function menor() {
    res.textContent += '>'
}

function aspas() {
    res.textContent += '"'
}

function espaço() {
    res.textContent += ' '
}



function enter(){
    var res = document.getElementById('codigo_persona').innerHTML
    alert(res)
}