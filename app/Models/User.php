<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
//ErrorException: foreach() argument must be of type array|object, string given in C:\xampp\htdocs\quanlysinhvien\storage\framework\views\b7cef4611eaae0adf48516430307c34cf90a8872.php:48
//Stack trace:
//#0 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Foundation\Bootstrap\HandleExceptions.php(259): Illuminate\Foundation\Bootstrap\HandleExceptions->handleError()
//#1 C:\xampp\htdocs\quanlysinhvien\storage\framework\views\b7cef4611eaae0adf48516430307c34cf90a8872.php(48): Illuminate\Foundation\Bootstrap\HandleExceptions->Illuminate\Foundation\Bootstrap\{closure}()
//#2 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php(109): require('...')
//#3 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Filesystem\Filesystem.php(110): Illuminate\Filesystem\Filesystem::Illuminate\Filesystem\{closure}()
//#4 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php(58): Illuminate\Filesystem\Filesystem->getRequire()
//#5 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php(61): Illuminate\View\Engines\PhpEngine->evaluatePath()
//#6 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\View.php(139): Illuminate\View\Engines\CompilerEngine->get()
//#7 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\View.php(122): Illuminate\View\View->getContents()
//#8 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\View.php(91): Illuminate\View\View->renderContents()
//#9 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(381): Illuminate\View\View->render()
//#10 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(358): Illuminate\Mail\Mailer->renderView()
//#11 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(270): Illuminate\Mail\Mailer->addContent()
//#12 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(211): Illuminate\Mail\Mailer->send()
//#13 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Support\Traits\Localizable.php(19): Illuminate\Mail\Mailable->Illuminate\Mail\{closure}()
//#14 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(212): Illuminate\Mail\Mailable->withLocale()
//#15 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\SendQueuedMailable.php(66): Illuminate\Mail\Mailable->send()
//#16 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Mail\SendQueuedMailable->handle()
//#17 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
//#18 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure()
//#19 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod()
//#20 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Container.php(651): Illuminate\Container\BoundMethod::call()
//#21 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(128): Illuminate\Container\Container->call()
//#22 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Bus\Dispatcher->Illuminate\Bus\{closure}()
//#23 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}()
//#24 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(132): Illuminate\Pipeline\Pipeline->then()
//#25 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(124): Illuminate\Bus\Dispatcher->dispatchNow()
//#26 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Queue\CallQueuedHandler->Illuminate\Queue\{closure}()
//#27 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}()
//#28 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(126): Illuminate\Pipeline\Pipeline->then()
//#29 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(70): Illuminate\Queue\CallQueuedHandler->dispatchThroughMiddleware()
//#30 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Jobs\Job.php(98): Illuminate\Queue\CallQueuedHandler->call()
//#31 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(425): Illuminate\Queue\Jobs\Job->fire()
//#32 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(375): Illuminate\Queue\Worker->process()
//#33 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(173): Illuminate\Queue\Worker->runJob()
//#34 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(150): Illuminate\Queue\Worker->daemon()
//#35 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(134): Illuminate\Queue\Console\WorkCommand->runWorker()
//#36 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Queue\Console\WorkCommand->handle()
//#37 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
//#38 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure()
//#39 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod()
//#40 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Container.php(651): Illuminate\Container\BoundMethod::call()
//#41 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Console\Command.php(144): Illuminate\Container\Container->call()
//#42 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Command\Command.php(308): Illuminate\Console\Command->execute()
//#43 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Console\Command.php(126): Symfony\Component\Console\Command\Command->run()
//#44 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Application.php(1002): Illuminate\Console\Command->run()
//#45 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Application.php(299): Symfony\Component\Console\Application->doRunCommand()
//#46 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Application.php(171): Symfony\Component\Console\Application->doRun()
//#47 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Console\Application.php(102): Symfony\Component\Console\Application->run()
//#48 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Foundation\Console\Kernel.php(129): Illuminate\Console\Application->run()
//#49 C:\xampp\htdocs\quanlysinhvien\artisan(37): Illuminate\Foundation\Console\Kernel->handle()
//#50 {main}
//
//Next Illuminate\View\ViewException: foreach() argument must be of type array|object, string given (View: C:\xampp\htdocs\quanlysinhvien\resources\views\mail\StatusStudentEmail.blade.php) in C:\xampp\htdocs\quanlysinhvien\storage\framework\views\b7cef4611eaae0adf48516430307c34cf90a8872.php:48
//Stack trace:
//#0 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\Engines\PhpEngine.php(60): Illuminate\View\Engines\CompilerEngine->handleViewException()
//#1 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\Engines\CompilerEngine.php(61): Illuminate\View\Engines\PhpEngine->evaluatePath()
//#2 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\View.php(139): Illuminate\View\Engines\CompilerEngine->get()
//#3 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\View.php(122): Illuminate\View\View->getContents()
//#4 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\View\View.php(91): Illuminate\View\View->renderContents()
//#5 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(381): Illuminate\View\View->render()
//#6 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(358): Illuminate\Mail\Mailer->renderView()
//#7 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailer.php(270): Illuminate\Mail\Mailer->addContent()
//#8 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(211): Illuminate\Mail\Mailer->send()
//#9 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Support\Traits\Localizable.php(19): Illuminate\Mail\Mailable->Illuminate\Mail\{closure}()
//#10 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\Mailable.php(212): Illuminate\Mail\Mailable->withLocale()
//#11 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Mail\SendQueuedMailable.php(66): Illuminate\Mail\Mailable->send()
//#12 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Mail\SendQueuedMailable->handle()
//#13 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
//#14 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure()
//#15 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod()
//#16 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Container.php(651): Illuminate\Container\BoundMethod::call()
//#17 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(128): Illuminate\Container\Container->call()
//#18 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Bus\Dispatcher->Illuminate\Bus\{closure}()
//#19 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}()
//#20 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Bus\Dispatcher.php(132): Illuminate\Pipeline\Pipeline->then()
//#21 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(124): Illuminate\Bus\Dispatcher->dispatchNow()
//#22 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(141): Illuminate\Queue\CallQueuedHandler->Illuminate\Queue\{closure}()
//#23 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php(116): Illuminate\Pipeline\Pipeline->Illuminate\Pipeline\{closure}()
//#24 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(126): Illuminate\Pipeline\Pipeline->then()
//#25 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\CallQueuedHandler.php(70): Illuminate\Queue\CallQueuedHandler->dispatchThroughMiddleware()
//#26 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Jobs\Job.php(98): Illuminate\Queue\CallQueuedHandler->call()
//#27 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(425): Illuminate\Queue\Jobs\Job->fire()
//#28 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(375): Illuminate\Queue\Worker->process()
//#29 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Worker.php(173): Illuminate\Queue\Worker->runJob()
//#30 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(150): Illuminate\Queue\Worker->daemon()
//#31 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Queue\Console\WorkCommand.php(134): Illuminate\Queue\Console\WorkCommand->runWorker()
//#32 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(36): Illuminate\Queue\Console\WorkCommand->handle()
//#33 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Util.php(41): Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
//#34 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(93): Illuminate\Container\Util::unwrapIfClosure()
//#35 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php(37): Illuminate\Container\BoundMethod::callBoundMethod()
//#36 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Container\Container.php(651): Illuminate\Container\BoundMethod::call()
//#37 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Console\Command.php(144): Illuminate\Container\Container->call()
//#38 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Command\Command.php(308): Illuminate\Console\Command->execute()
//#39 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Console\Command.php(126): Symfony\Component\Console\Command\Command->run()
//#40 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Application.php(1002): Illuminate\Console\Command->run()
//#41 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Application.php(299): Symfony\Component\Console\Application->doRunCommand()
//#42 C:\xampp\htdocs\quanlysinhvien\vendor\symfony\console\Application.php(171): Symfony\Component\Console\Application->doRun()
//#43 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Console\Application.php(102): Symfony\Component\Console\Application->run()
//#44 C:\xampp\htdocs\quanlysinhvien\vendor\laravel\framework\src\Illuminate\Foundation\Console\Kernel.php(129): Illuminate\Console\Application->run()
//#45 C:\xampp\htdocs\quanlysinhvien\artisan(37): Illuminate\Foundation\Console\Kernel->handle()
//#46 {main}


}
