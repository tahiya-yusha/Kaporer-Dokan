@extends('layouts.auth')

@section('title', 'Order Placed')

<style>
    html {
    -webkit-box-sizing: border-box;
    box-sizing: border-box
}

*,
*:before,
*:after {
    -webkit-box-sizing: inherit;
    box-sizing: inherit
}

@-webkit-keyframes confetti-slow {
    0% {
        -webkit-transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        transform: translate3d(0, 0, 0) rotateX(0) rotateY(0)
    }
    100% {
        -webkit-transform: translate3d(25px, 105vh, 0) rotateX(360deg) rotateY(180deg);
        transform: translate3d(25px, 105vh, 0) rotateX(360deg) rotateY(180deg)
    }
}

@keyframes confetti-slow {
    0% {
        -webkit-transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        transform: translate3d(0, 0, 0) rotateX(0) rotateY(0)
    }
    100% {
        -webkit-transform: translate3d(25px, 105vh, 0) rotateX(360deg) rotateY(180deg);
        transform: translate3d(25px, 105vh, 0) rotateX(360deg) rotateY(180deg)
    }
}

@-webkit-keyframes confetti-medium {
    0% {
        -webkit-transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        transform: translate3d(0, 0, 0) rotateX(0) rotateY(0)
    }
    100% {
        -webkit-transform: translate3d(100px, 105vh, 0) rotateX(100deg) rotateY(360deg);
        transform: translate3d(100px, 105vh, 0) rotateX(100deg) rotateY(360deg)
    }
}

@keyframes confetti-medium {
    0% {
        -webkit-transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        transform: translate3d(0, 0, 0) rotateX(0) rotateY(0)
    }
    100% {
        -webkit-transform: translate3d(100px, 105vh, 0) rotateX(100deg) rotateY(360deg);
        transform: translate3d(100px, 105vh, 0) rotateX(100deg) rotateY(360deg)
    }
}

@-webkit-keyframes confetti-fast {
    0% {
        -webkit-transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        transform: translate3d(0, 0, 0) rotateX(0) rotateY(0)
    }
    100% {
        -webkit-transform: translate3d(-50px, 105vh, 0) rotateX(10deg) rotateY(250deg);
        transform: translate3d(-50px, 105vh, 0) rotateX(10deg) rotateY(250deg)
    }
}

@keyframes confetti-fast {
    0% {
        -webkit-transform: translate3d(0, 0, 0) rotateX(0) rotateY(0);
        transform: translate3d(0, 0, 0) rotateX(0) rotateY(0)
    }
    100% {
        -webkit-transform: translate3d(-50px, 105vh, 0) rotateX(10deg) rotateY(250deg);
        transform: translate3d(-50px, 105vh, 0) rotateX(10deg) rotateY(250deg)
    }
}

.confetti-container {
    -webkit-perspective: 700px;
    perspective: 700px;
    position: absolute;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 2
}

.confetti {
    position: absolute;
    z-index: 1;
    top: -10px;
    border-radius: 0%
}

.confetti--animation-slow {
    -webkit-animation: confetti-slow 3.25s linear 1 forwards;
    animation: confetti-slow 3.25s linear 1 forwards
}

.confetti--animation-medium {
    -webkit-animation: confetti-medium 2.75s linear 1 forwards;
    animation: confetti-medium 2.75s linear 1 forwards
}

.confetti--animation-fast {
    -webkit-animation: confetti-fast 2.25s linear 1 forwards;
    animation: confetti-fast 2.25s linear 1 forwards
}

.hbd {
  position: absolute;
  top: 0;
  left: 0;
}

@supports (animation: grow .5s cubic-bezier(.25, .25, .25, 1) forwards) {
     .tick {
        stroke-opacity: 0;
        stroke-dasharray: 29px;
        stroke-dashoffset: 29px;
        animation: draw .5s cubic-bezier(.25, .25, .25, 1) forwards;
        animation-delay: .6s
    }

    .circle {
        fill-opacity: 0;
        stroke: #219a00;
        stroke-width: 16px;
        transform-origin: center;
        transform: scale(0);
        animation: grow 1s cubic-bezier(.25, .25, .25, 1.25) forwards;   
    }   
}

@keyframes grow {
    60% {
        transform: scale(.8);
        stroke-width: 4px;
        fill-opacity: 0;
    }
    100% {
        transform: scale(.9);
        stroke-width: 8px;
        fill-opacity: 1;
        fill: #219a00;
    }
}

@keyframes draw {
    0%, 100% { stroke-opacity: 1; }
    100% { stroke-dashoffset: 0; }
}








// Styles
:root {
  --theme-color: var(--color-purple);
}

body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.no-scroll {
        overflow: hidden;
    }
</style>

@section('content')


<div class="js-container" style="padding: 80px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <div class="svg-container">    
        <svg class="ft-green-tick" xmlns="http://www.w3.org/2000/svg" height="300" width="300" viewBox="0 0 48 48" aria-hidden="true">
            <circle class="circle" fill="#5bb543" cx="24" cy="24" r="22"/>
            <path class="tick" fill="none" stroke="#FFF" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M14 27l5.917 4.917L34 17"/>
        </svg>
    </div>
    <h4> Thank you for placing your order!!</h4>
    <a href="{{ url('collections') }}" class = "btn btn-black">Shop now! </a>
</div>

<script>
    let path = document.querySelector(".tick");
    let length = path.getTotalLength();

    console.log(length); 
    const Confettiful = function(el) {
        this.el = el;
        this.containerEl = null;
        this.confettiFrequency = 3;
        this.confettiColors = ['#fce18a', '#ff726d', '#b48def', '#f4306d'];
        this.confettiAnimations = ['slow', 'medium', 'fast'];
        this._setupElements();
        this._renderConfetti();
    };

    Confettiful.prototype._setupElements = function() {
        const containerEl = document.createElement('div');
        const elPosition = this.el.style.position;
        if (elPosition !== 'relative' || elPosition !== 'absolute') {
            this.el.style.position = 'relative';
        }
        containerEl.classList.add('confetti-container');
        this.el.appendChild(containerEl);
        this.containerEl = containerEl;
    };

    Confettiful.prototype._renderConfetti = function() {
        this.confettiInterval = setInterval(() => {
            const confettiEl = document.createElement('div');
            const confettiSize = (Math.floor(Math.random() * 3) + 7) + 'px';
            const confettiBackground = this.confettiColors[Math.floor(Math.random() * this.confettiColors.length)];
            const confettiLeft = (Math.floor(Math.random() * this.el.offsetWidth)) + 'px';
            const confettiAnimation = this.confettiAnimations[Math.floor(Math.random() * this.confettiAnimations.length)];
            confettiEl.classList.add('confetti', 'confetti--animation-' + confettiAnimation);
            confettiEl.style.left = confettiLeft;
            confettiEl.style.width = confettiSize;
            confettiEl.style.height = confettiSize;
            confettiEl.style.backgroundColor = confettiBackground;
            confettiEl.removeTimeout = setTimeout(function() {
            confettiEl.parentNode.removeChild(confettiEl);
            }, 3000);
            this.containerEl.appendChild(confettiEl);
        }, 25);
    };

    window.confettiful = new Confettiful(document.querySelector('.js-container'));
</script>

@endsection

