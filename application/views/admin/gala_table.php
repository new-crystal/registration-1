<style>

.menu-item,
.menu-open-button {
   background: #EEEEEE;
   border-radius: 100%;
   width: 80px;
   height: 80px;
   margin-left: -40px;
   position: absolute;
   color: #FFFFFF;
   text-align: center;
   line-height: 80px;
   transform: translate3d(-54px, -15px, 0);
}

.menu-open {
   display: none;
}

.menu {
   margin: auto;
   position: absolute;
   top: 0;
   bottom: 0;
   left: 0;
   right: 0;
   width: 80px;
   height: 80px;
   text-align: center;
   box-sizing: border-box;
   font-size: 26px;
}

.menu-item:hover {
   background: #EEEEEE;
   color: #3290B1;
}

.menu-item {
   width: 50px;
   height: 50px;
   display:flex;
   align-items: center;
   justify-content: center;
}

.menu-item:nth-child(3) {
   transform: translate3d(0.08361px, -104.99997px, 0);
}

.menu-item:nth-child(4) {
   transform: translate3d(90.9466px, -52.47586px, 0);
}

.menu-item:nth-child(5) {
   transform: translate3d(90.9466px, 52.47586px, 0);
}

.menu-item:nth-child(6) {
   transform: translate3d(0.08361px, 104.99997px, 0);
}

.menu-item:nth-child(7) {
   transform: translate3d(-90.86291px, 52.62064px, 0);
}

.menu-item:nth-child(8) {
   transform: translate3d(-91.03006px, -52.33095px, 0);
}

.menu-item:nth-child(9) {
   transform: translate3d(-0.25084px, -104.9997px, 0);
}

.blue {
   background-color: #669AE1;
   box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
   text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
}

.blue:hover {
   color: #669AE1;
   text-shadow: none;
}

.green {
   background-color: #70CC72;
   box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
   text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
}

.green:hover {
   color: #70CC72;
   text-shadow: none;
}

.red {
   background-color: #FE4365;
   box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
   text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
}

.red:hover {
   color: #FE4365;
   text-shadow: none;
}

.purple {
   background-color: #C49CDE;
   box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
   text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
}

.purple:hover {
   color: #C49CDE;
   text-shadow: none;
}

.orange {
   background-color: #FC913A;
   box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
   text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
}

.orange:hover {
   color: #FC913A;
   text-shadow: none;
}

.lightblue {
   background-color: #62C2E4;
   box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
   text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
}

.lightblue:hover {
   color: #62C2E4;
   text-shadow: none;
}


</style>
<div class="menu">
   <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" /> 
    <div class="menu-open-button" style="display: inline;"></div>
   <a href="#" class="menu-item blue">1</a>
   <a href="#" class="menu-item green">2</a>
   <a href="#" class="menu-item red">3</a>
   <a href="#" class="menu-item purple">4</a>
   <a href="#" class="menu-item orange">5</a>
   <a href="#" class="menu-item lightblue">6</a>
</div>
