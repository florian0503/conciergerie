<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__ . '/src')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setRules([
        '@PSR12'                       => true,
        'array_syntax'                 => ['syntax' => 'short'],
        'ordered_imports'              => ['sort_algorithm' => 'alpha'],
        'no_unused_imports'            => true,
        'trailing_comma_in_multiline'  => true,
        'phpdoc_scalar'                => true,
        'single_quote'                 => true,
        'blank_line_before_statement'  => ['statements' => ['return']],
        'method_chaining_indentation'  => true,
        'no_extra_blank_lines'         => true,
    ])
    ->setFinder($finder)
    ->setLineEnding("\n");
