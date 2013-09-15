require 'rake'
require 'watchr'
require 'growl'

def clear_console
  puts "\e[H\e[2J"
end

path = File.expand_path('.', 'public')

task :test do
  clear_console()
  system("phpunit")

  script = Watchr::Script.new
  script.watch('(src|tests)/(.*)\.php') do |md|
    clear_console()
    testpath = md[1].sub(/./) { |s| s.upcase }
    begin
      result = %x[phpunit]
      puts result

      if Growl.installed?
        result = result.split("\n").last(3)
        title = result.find { |e| /FAILURES/ =~ e } ? "FAILURES" : "PASS"
        message = /2K(.*)/.match(result[1])[1]
        if title === "PASS"
          Growl.notify_ok message, :title => title
        else
          Growl.notify_error message, :title => title
        end
      end
    rescue
      if Growl.installed?
        Growl.notify_error "Failed to run tests", :title => 'SYNTAX ERROR'
      else
        puts "Failed to run tests due to syntax error"
      end
    end
  end

  handler = Watchr.handler.new
  controller = Watchr::Controller.new(script, handler)
  controller.run
end

