package
{
	import fl.transitions.Tween;
	import fl.transitions.TweenEvent;
	
	import flash.display.MovieClip;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.events.TouchEvent;
	import flash.events.TransformGestureEvent;
	import flash.text.TextField;
	import flash.ui.Multitouch;
	import flash.ui.MultitouchInputMode;
	import flash.utils.Timer;
	
	public class Juego extends MovieClip
	{
		public var base:MovieClip;
		public var deb:TextField;
		public var cantidad:int;
		public var velocidad:int;
		public var vidas:int;
		public var intervalo:int;
		public var reapers:Array;
		public var timer:Timer;
		public var baseFail:Fail;
		public var perdiste:Perdiste;
		
		public function Juego()
		{
			Multitouch.inputMode=MultitouchInputMode.TOUCH_POINT;
			
			//Dificultad
			cantidad = 20;
			velocidad = 4;
			vidas = 3;
			intervalo = 500;
			
			timer = new Timer(intervalo, cantidad);
			timer.addEventListener(TimerEvent.TIMER, crearReapers);
			timer.start();
			
			this.addEventListener(TouchEvent.TOUCH_TAP, fail);
			base.addEventListener(TouchEvent.TOUCH_BEGIN, arrastrar); 
			base.addEventListener(TouchEvent.TOUCH_END, soltar);
			
			var musica:Musica = new Musica();
			musica.play();
			baseFail = new Fail();
			perdiste = new Perdiste();
			
		}
		
		public function crearReapers(t:TimerEvent):void
		{
			var nuevoReaper:Enemigo = new Enemigo(
										aleatorio(800, 900),
										aleatorio(0, 350),
										aleatorio(250,350),
										velocidad
									 );
			nuevoReaper.addEventListener("disparo", impacto);
			nuevoReaper.addEventListener("derribado", conteo);
			this.addChild(nuevoReaper);
			
			nuevoReaper.animacion.start();
			
			nuevoReaper = null;
		}
		
		public function arrastrar(e:TouchEvent) { 
			e.target.startTouchDrag(e.touchPointID, false, this.getRect(this));  
		} 
		
		public function soltar(e:TouchEvent) { 
			e.target.stopTouchDrag(e.touchPointID); 
		}
		
		public function impacto(ev:Event):void
		{
			vidas--;
			if(vidas == 0)
			{
				perder();
			}
			depurar("auch! " + vidas);
			descontar();
		}
		
		public function conteo(ev:Event):void
		{
			descontar();
		}

		public function descontar():void
		{
			depurar("Yay! " + cantidad);
			cantidad--;
			if(cantidad == 0)
			{
				depurar("GANASTE");
			}
		}
		
		public function fail(ev:TouchEvent):void
		{
			baseFail.play();
			depurar("fail!");
		}
		
		public function perder():void
		{
			perdiste.play();
		}
		
		private function aleatorio(inicio:Number, fin:Number):Number
		{
			return (Math.floor(Math.random() * (fin - inicio + 1)) + inicio);
		}
		private function depurar(texto:String):void
		{
			deb.appendText(texto + "\n");
			deb.scrollV = 1000;
		}
	}
}