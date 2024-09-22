<style>
    html, body {
        margin: 0;
        padding: 0;
    }

    .loader-hide-scrollbar{
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }
    .loader-hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    #loader-head {
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 10000;
        position: fixed;
        top: 0;
        left: 0;
        /*background-color: rgb(243 244 246) ;*/
        /*background-color: rgb(17 24 39);*/
    }

    .lds-ring {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 64px;
        height: 64px;
        margin: 8px;
        border: 8px solid rgb(107 114 128);
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: rgb(107 114 128) transparent transparent transparent;
    }

    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }

    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }

    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }

    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


    @media (prefers-color-scheme: dark) {
        #loader-head {
            background-color: rgb(17 24 39);
        }
    }

    @media (prefers-color-scheme: light) {
        #loader-head {
            background-color: rgb(243 244 246);
        }
    }
</style>
