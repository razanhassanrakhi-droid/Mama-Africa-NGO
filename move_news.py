import re

filepath = r"c:\xampp\htdocs\my-project\resources\views\inde.blade.php"
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

# Try exact string find for news section first
start_str = '<section id="lastnews" style="scroll-margin-top: 80px;">'
end_str = '</main>\n</section>'

start_idx = content.find(start_str)
if start_idx != -1:
    # Find the end of the section
    end_idx = content.find(end_str, start_idx) + len(end_str)
    
    news_content = content[start_idx:end_idx]
    
    # Remove from original location
    content = content[:start_idx] + "<!-- News section was moved above Transparency -->" + content[end_idx:]
    
    # Insert before transparency
    trans_str = '<section id="transparency" class="w-100 p-0 m-0" style="background-color: #1c1917; position: relative; overflow: visible;">'
    trans_idx = content.find(trans_str)
    
    if trans_idx != -1:
        content = content[:trans_idx] + news_content + "\n\n  " + content[trans_idx:]
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print("Successfully moved News section above Transparency!")
    else:
        print("Could not find Transparency section!")
else:
    print("Could not find News section!")
