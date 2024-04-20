@include('layouts.header')
@include('topbar')

Witaj w HIMARSIE. Czuj się jak u siebie! Have nice day!

<br>
<div class="main-cont">
    <a href="{{ route('announcement.index') }}" style="color: rgb(41, 139, 175);">
        <div class="cvb ow2">
            <div>
                <img src="{{ asset('icons/announcement.svg') }}" alt="Ogłoszenie"
                    style="width: 20px; height: 20px; margin-right: 5px;">
            </div>
            <div>Ogłoszenia</div>
        </div>
    </a>

    <a href="#" onclick="return false;" style="color: gray; text-decoration: none; position: relative;">
        <div class="cvb ow2">
            <div>
                <img src="{{ asset('icons/meldo.svg') }}" alt="Ogłoszenie"
                    style="width: 20px; height: 20px; margin-right: 5px;">
            </div>
            <div>Zamelduj się</div>
        </div>
        <span style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: no-drop;"></span>
    </a>

    <a href="#" onclick="return false;" style="color: gray; text-decoration: none; position: relative;">
        <div class="cvb ow2">
            <div>
                <img src="{{ asset('icons/innovation.svg') }}" alt="Ogłoszenie"
                    style="width: 20px; height: 20px; margin-right: 5px;">
            </div>
            <div>Pomysły</div>
        </div>
        <span style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: no-drop;"></span>
    </a>


</div>

@include('layouts.footer')

<style>
    .main-cont>a {
        padding: 4px;
    }

    .main-cont {
        padding: 1rem;
        display: flex;
        flex-direction: row;
    }

    .cvb {
        width: 200px;
        height: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-evenly;
    }
</style>
