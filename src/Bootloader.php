<?php
declare(strict_types=1);

namespace IfCastle\Monolog;

use IfCastle\Application\Bootloader\BootloaderExecutorInterface;
use IfCastle\Application\Bootloader\BootloaderInterface;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

final class Bootloader implements BootloaderInterface
{
    public function buildBootloader(BootloaderExecutorInterface $bootloaderExecutor): void
    {
        $bootloaderExecutor->getBootloaderContext()->getSystemEnvironmentBootBuilder()
            ->bindObject(LoggerInterface::class, $this->buildLogger($bootloaderExecutor->getBootloaderContext()->getApplicationType()));
    }
    
    private function buildLogger(string $applicationType): LoggerInterface
    {
        // @todo: Configure the logger.
        return new Logger($applicationType);
    }
}