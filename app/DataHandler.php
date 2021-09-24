<?php

    namespace App;

    use League\Csv\Reader;
    use League\Csv\Writer;

    class DataHandler
    {
        private string $path;
        private Reader $csv;
        private Writer $csvWriter;

        public function __construct(string $path)
        {
            $this->path = $path;
            $this->csv = Reader::createFromPath($path, 'r');
            $this->csv->setHeaderOffset(0);

            $this->csvWriter = Writer::createFromPath($this->path, 'r+');
        }
    }