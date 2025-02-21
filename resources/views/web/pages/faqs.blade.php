@extends('web.app')

@section('title')
    @lang('site.faqs') | @parent
@stop

@section('content')
    <h1>Preguntas Frecuentes</h1>
    <hr />
    <dl class="faqs">
        <dt class="q"><span>Q:</span>¿Cuál es el compilador que utiliza el juez y cuáles son las opciones de compilador?
        </dt>
        <dd>
            <span class="sp-a">A:</span>
            <div class="a well">
                <p>El sistema de juez en línea está funcionando en <a target="_blank" href="http://www.debian.org/">Debian
                        Linux</a>. Estamos utilizando <a target="_blank" href="http://gcc.gnu.org/">GNU GCC/G++</a> para
                    compilar C/C++, <a target="_blank" href="http://www.freepascal.org">Free Pascal</a> para compilar Pascal y
                    <a target="_blank" href="http://www.gnu-pascal.de">sun-java-jdk1.6</a> para Java. Las opciones de
                    compilación son:</p>
                <table class="table table-bordered">
                    <tr>
                        <td>C:</td>
                        <td class="com-flags">gcc Main.c -o Main -ansi -fno-asm -O2 -Wall -lm --static</td>
                    </tr>
                    <tr>
                        <td>C++:</td>
                        <td class="com-flags">g++ Main.c -o Main -ansi -fno-asm -O2 -Wall -lm --static</td>
                    </tr>
                    <tr>
                        <td>Pascal:</td>
                        <td class="com-flags">fpc -Co -Cr -Ct -Ci</td>
                    </tr>
                    <tr>
                        <td>Java:</td>
                        <td class="com-flags">javac Main.java</td>
                    </tr>
                </table>
                <p>La versión de nuestro software de compilador es:</p>
                <ul id="compiler-version">
                    <li>gcc/g++ 4.1.2 20061115 (pre-release) (Debian 4.1.1-21)</li>
                    <li>glibc 2.3.6</li>
                    <li>Free Pascal Compiler versión 2.2.4-3 [2009/06/04] para i386</li>
                    <li>Java 1.6.0_06</li>
                </ul>
            </div>
        </dd>
        <dt class="q"><span>Q:</span>¿Dónde se encuentra la entrada y la salida?</dt>
        <dd>
            <span class="sp-a">A:</span>
            <div class="a well">
                <p>Tu programa debe leer la entrada desde stdin ('Entrada Estándar') y escribir la salida a stdout ('Salida
                    Estándar'). Por ejemplo, puedes usar 'scanf' en C o 'cin' en C++ para leer desde stdin, y usar 'printf'
                    en C o 'cout' en C++ para escribir a stdout.<br />Los programas de usuario no pueden abrir y leer
                    desde/escribir a archivos; recibirás un "<span class="hint">Error en tiempo de ejecución</span>" si
                    intentas hacerlo.<br /></p>
            </div>
            <dl>
                <dt>He aquí una solución de ejemplo para el problema 1000 usando C++:</dt>
                <dd>
                    <pre class="prettyprint linenums solution-code">
#include &lt;iostream&gt;
using namespace std;
int main(){
    int a,b;
    while(cin >> a >> b)
        cout << a+b << endl;
    return 0;
}
</pre>
                </dd>
                <dt>He aquí una solución de ejemplo para el problema 1000 usando C:</dt>
                <dd>
                    <pre class="prettyprint linenums solution-code">
#include &lt;stdio.h&gt;
int main(){
    int a,b;
    while(scanf("%d %d",&amp;a, &amp;b) != EOF)
        printf("%d\n",a+b);
    return 0;
}
</pre>
                </dd>
                <dt>He aquí una solución de ejemplo para el problema 1000 usando PASCAL:</dt>
                <dd>
                    <pre class="prettyprint linenums solution-code">
program p1001(Input,Output);
var
  a,b:Integer;
begin
   while not eof(Input) do
     begin
       Readln(a,b);
       Writeln(a+b);
     end;
end.
</pre>
                </dd>
                <dt>He aquí una solución de ejemplo para el problema 1000 usando Java:</dt>
                <dd>
                    <pre class="prettyprint linenums solution-code">
public class Main{
    public static void main(String args[]){
        Scanner cin = new Scanner(System.in);
        int a, b;
        while (cin.hasNext()){
            a = cin.nextInt(), b = cin.nextInt();
            System.out.println(a + b);
        }
    }
}</pre>
                </dd>
        </dd>
        <dt class="q"><span>Q:</span>¿Por qué recibí un error de compilación? ¡Está bien hecho!</dt>
        <dd>
            <span class="sp-a">A:</span>
            <div class="well a">
                <p>Existen algunas diferencias entre GNU y MS-VC++, tales como:</p>
                <ol>
                    <li><span class="hint"><em>main</em></span> debe declararse como <span class="notice">int</span>,
                        <span class="notice">void main</span> provocará un error de compilación.</li>
                    <li><span class="hint">i</span> queda fuera de definición después de un bloque "<span
                            class="notice">for</span>(<span class="notice">int</span> <span
                            class="notice">i</span>=0...){...}"</li>
                    <li><span class="hint">itoa</span> no es una función ANSI.</li>
                    <li><span class="hint">__int64</span> de VC no es ANSI, pero puedes usar <span class="notice">long
                            long</span> para enteros de 64 bits.</li>
                </ol>
            </div>
        </dd>
        <dt class="q"><span>Q:</span>¿Qué significa la respuesta del juez XXXXX?</dt>
        <dd>
            <span class="sp-a">A:</span>
            <div class="a well">
                <p>A continuación se muestra una lista de las respuestas del juez y su significado:</p>
                <ul>
                    <li><span class="label label-default">Pendiente</span> : El juez está tan ocupado que no puede evaluar
                        tu envío en este momento, generalmente solo debes esperar un minuto y tu envío será evaluado.</li>
                    <li><span class="label label-default">Pendiente de Rejuzgar</span> : Los datos de prueba han sido
                        actualizados, y el envío será evaluado nuevamente. Todos estos envíos estaban esperando para el
                        Rejuzgamiento.</li>
                    <li><span class="label label-default">Compilando</span> : El juez está compilando tu código fuente.</li>
                    <li><span class="label label-default">Ejecutando y Evaluando</span>: Tu código se está ejecutando y
                        siendo evaluado por nuestro Juez en Línea.</li>
                    <li><span class="label label-default">Aceptado</span> : ¡Bien hecho! Tu programa es correcto.</li>
                    <li><span class="label label-default">Error de Presentación</span> : El formato de salida no es
                        exactamente el mismo que el formato esperado por el juez, aunque tu respuesta al problema es
                        correcta. Revisa tu salida para espacios, líneas en blanco, etc., según la especificación de salida
                        del problema.</li>
                    <li><span class="label label-default">Respuesta Incorrecta</span> : No se alcanzó la solución correcta
                        para las entradas. Las entradas y salidas que utilizamos para probar los programas no son públicas
                        (es recomendable acostumbrarse a la dinámica de un concurso real ;-)).</li>
                    <li><span class="label label-default">Tiempo Limite Excedido</span> : Tu programa intentó ejecutarse
                        durante demasiado tiempo.</li>
                    <li><span class="label label-default">Límite de Memoria Excedido</span> : Tu programa intentó usar más
                        memoria de la permitida por la configuración predeterminada del juez.</li>
                    <li><span class="label label-default">Límite de Salida Excedido</span>: Tu programa intentó escribir
                        demasiada información. Esto generalmente ocurre si entra en un bucle infinito. Actualmente, el
                        límite de salida es de 1MB de bytes.</li>
                    <li><span class="label label-default">Error en Tiempo de Ejecución</span> : Cualquier otro error durante
                        la ejecución resultará en un error en tiempo de ejecución, como "fallo de segmentación", "excepción
                        de punto flotante", "uso de funciones prohibidas", "intento de acceso a memorias prohibidas", etc.
                    </li>
                    <li><span class="label label-default">Error de Compilación
                    </li>
                    <li><span class="label label-default">Limitación de tiempo excedida</span> : Tu programa intentó
                        ejecutarse durante más tiempo del permitido.</li>
                    <li><span class="label label-default">Limitación de memoria excedida</span> : Tu programa intentó usar
                        más memoria de la que está configurada por el juez.</li>
                    <li><span class="label label-default">Límite de salida excedido</span>: Tu programa intentó escribir
                        demasiada información. Esto suele ocurrir si entra en un bucle infinito. Actualmente, el límite de
                        salida es de 1MB.</li>
                    <li><span class="label label-default">Error de ejecución</span> : Todos los demás errores durante la
                        fase de ejecución se consideran errores de ejecución, tales como 'falla de segmentación', 'excepción
                        de punto flotante', 'uso de funciones prohibidas', 'intento de acceso a memoria prohibida', entre
                        otros.</li>
                    <li><span class="label label-default">Error de compilación</span> : El compilador (gcc/g++/gpc) no pudo
                        compilar tu programa ANSI. Por supuesto, los mensajes de advertencia no son errores. Haz clic en el
                        enlace proporcionado por la respuesta del juez para ver el mensaje de error real.</li>
                </ul>
            </div>
        </dd>
    </dl>
@stop
