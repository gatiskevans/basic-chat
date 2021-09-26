<?php

    namespace App;

    use League\Csv\Reader;
    use League\Csv\Writer;
    use League\Csv\Statement;

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

            $this->csvWriter = Writer::createFromPath($this->path, 'a+');
        }

        public function writeIntoFile(string $nickname, string $message): void
        {
            $chatMessage = [$nickname, $message];
            $this->csvWriter->insertOne($chatMessage);
        }

        public function statement(): void
        {
            foreach(Statement::create()->process($this->csv) as $record){
                $record['message'] = wordwrap($record['message'], 50, "<br>");
                echo "<div id='message'><b>{$record['nickname']}</b>: {$record['message']}</div><br>";
            }
        }
    }