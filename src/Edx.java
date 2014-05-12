import java.io.FileWriter;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;


public class Edx
{
<<<<<<< HEAD
    public static void main(String args[]) throws IOException
    {
        int prof_ID = 1;
        int course_ID = 1;
       
        String url1 = "https://www.edx.org/course-list";
        String url2 = "https://www.edx.org/course-list?page=1";
        String url3 = "https://www.edx.org/course-list?page=2";
        String url4 = "https://www.edx.org/course-list?page=3";
        String url5 = "https://www.edx.org/course-list?page=4";
        String url6 = "https://www.edx.org/course-list?page=5";
        String url7 = "https://www.edx.org/course-list?page=6";
        String url8 = "https://www.edx.org/course-list?page=7";
        String url9 = "https://www.edx.org/course-list?page=8";
        String url10 = "https://www.edx.org/course-list?page=9";
        String url11 = "https://www.edx.org/course-list?page=10";
        String url12 = "https://www.edx.org/course-list?page=11";
       
        ArrayList pgcrs = new ArrayList<String>();
        pgcrs.add(url1);
        pgcrs.add(url2);
        pgcrs.add(url3);
        pgcrs.add(url4);
        pgcrs.add(url5);
        pgcrs.add(url6);
        pgcrs.add(url7);
        pgcrs.add(url8);
        pgcrs.add(url9);
        pgcrs.add(url10);
        pgcrs.add(url11);
     pgcrs.add(url12);
       
     String sFileName = "edX.csv";
     String sFileProf = "edXProf.csv";
=======
	public static void main(String args[]) throws IOException
	{
		int prof_ID = 30;
   	 
   	 String url1 = "https://www.edx.org/course-list";
   	 String url2 = "https://www.edx.org/course-list?page=1";
   	 String url3 = "https://www.edx.org/course-list?page=2";
   	 String url4 = "https://www.edx.org/course-list?page=3";
   	 String url5 = "https://www.edx.org/course-list?page=4";
   	 String url6 = "https://www.edx.org/course-list?page=5";
   	 String url7 = "https://www.edx.org/course-list?page=6";
   	 String url8 = "https://www.edx.org/course-list?page=7";
   	 String url9 = "https://www.edx.org/course-list?page=8";
   	 String url10 = "https://www.edx.org/course-list?page=9";
   	 String url11 = "https://www.edx.org/course-list?page=10";
   	 String url12 = "https://www.edx.org/course-list?page=11";
   	 
   	 ArrayList pgcrs = new ArrayList<String>();
   	 pgcrs.add(url1);
   	 pgcrs.add(url2);
   	 pgcrs.add(url3);
   	 pgcrs.add(url4);
   	 pgcrs.add(url5);
   	 pgcrs.add(url6);
   	 pgcrs.add(url7);
   	 pgcrs.add(url8);
   	 pgcrs.add(url9);
   	 pgcrs.add(url10);
   	 pgcrs.add(url11);
	 pgcrs.add(url12);
   	 
	 String sFileName = "/Users/parthvyas/Desktop/Parth/cs160/edX.csv";
	 String sFileProf = "/Users/parthvyas/Desktop/Parth/cs160/edXProf.csv";
>>>>>>> FETCH_HEAD
     
    FileWriter writer = new FileWriter(sFileName);
     FileWriter writer_prof = new FileWriter(sFileProf);
     
     writer_prof.append("prof id");
     writer_prof.append(',');
     writer_prof.append("profName");
     writer_prof.append(',');
     writer_prof.append("prof img");
     writer_prof.append(',');
     writer_prof.append("course ID");
     writer_prof.append('\n');
     
     writer.append("course ID");
     writer.append(',');
     writer.append("course title");
     writer.append(',');
     writer.append("short desc");
     writer.append(',');
     writer.append("long desc");
     writer.append(',');
     writer.append("site url");
     writer.append(',');
     writer.append("video link");
     writer.append(',');
     writer.append("OriginalDate");
     writer.append(',');
     writer.append("start");
     writer.append(',');
     writer.append("duration");
     writer.append(',');
     writer.append("course img");
     writer.append(',');
     writer.append("category");
     writer.append(',');
     writer.append("site url");
     writer.append(',');
     writer.append("price");
     writer.append(',');
     writer.append("language");
     writer.append(',');
     writer.append("certificate");
     writer.append(',');
     writer.append("university");
     writer.append(',');
     writer.append("time");
     writer.append(',');
     writer.append('\n');
    
        for(int a=0; a<pgcrs.size(); a++)
        {
           
           
            Document doc = Jsoup.connect(pgcrs.get(a).toString()).get();
       
        
        Elements Titles  = doc.select("h2[class=title course-title]");
        Elements shortDescription = doc.select("div[class=subtitle course-subtitle copy-detail]");
        Elements Course_url = doc.select("h2 a[href]");
        Elements Course_images = doc.select("div[class=image]").select("img[class=image-style-none]").select("img[src]");
                
       
        
        
            for (int i=0; i<Course_url.size(); i++)
            {
                String innerUrl = (String) Course_url.get(i).attr("abs:href").replace(",", "");
                Document innerDoc = Jsoup.connect(innerUrl).get();
                
                /**
                 * all strings with each course's individual value.
                 */
                
                String titles = Titles.get(i).text().replace(",", "");
                String short_desc = shortDescription.get(i).text().replace(",", "");
                String long_desc = innerDoc.select("div.course-detail-about").text().replace(",", "");
                String course_url = Course_url.get(i).attr("abs:href").replace(",", "");
                String videolink = innerDoc.select("div.course-detail-video a[href]").attr("abs:href").replace(",", "");
                if(innerDoc.select("div.course-detail-video a[href]").attr("abs:href").isEmpty())
                {
                    videolink = "N/A";
                }
                String date = innerDoc.select("div.course-detail-start").text().replace(",", "");
                String course_length = innerDoc.select("div.course-detail-length").text().replace(",", "");
                if(innerDoc.select("div.course-detail-length").text().isEmpty())
                {
                    course_length = "0";
                }
                else
                {
                    course_length = course_length.substring(course_length.indexOf(":")+2, course_length.indexOf(":")+3).replace(",", "");
                    
                }
                String course_images = Course_images.get(i).attr("abs:src").replace(",", "");
                String category = "N/A";
                String site_url = "edX";
                String price = "0";
                String language = "English";
                String certificate = "yes";
                String university = innerDoc.select("div.course-detail-school").text().replace(",", "");
                university = university.substring(university.indexOf(":")+1).replace(",", "");
                String timeScraped = new SimpleDateFormat("MM-dd-yyyy").format(new Date()).replace(",", "");
                
<<<<<<< HEAD
                String i_value = Integer.toString(course_ID);
                course_ID++;
               writer.append(i_value);
=======
                String i_value = Integer.toString(i+21);
                writer.append(i_value);
>>>>>>> FETCH_HEAD
                writer.append(',');
                
                Elements staff = innerDoc.select("h4[class=staff-title]");
                Elements staffIMG = innerDoc.select("div[class=staff-image]").select("img[src]");
                
                
                boolean hasImg = false;
                for (int j=0; j<staff.size(); j++)
                {
                    String staff_name = (String) staff.get(j).text().replace(",", "");
                    String prof_img = null;
                    
                    if(staffIMG.size() <= j)
                    {
                        hasImg = false;
                    }
                    else
                    {
                        prof_img = (String) staffIMG.get(j).attr("abs:src");
                        hasImg = true;
                    }
                    
                    String prof_ID_value = Integer.toString(prof_ID);
                    prof_ID++;
                    
                    writer_prof.append(prof_ID_value);
                    writer_prof.append(',');
                    writer_prof.append(staff_name);
                    writer_prof.append(',');
                    
                    if (hasImg)
                    {
                        writer_prof.append(prof_img);
                        writer_prof.append(',');
                    }
                    else
                    {
                        writer_prof.append("No image");
                        writer_prof.append(',');
                    }
                    
                    writer_prof.append(i_value);
                    
                    writer_prof.append('\n');
                    //System.out.println("staff name:" + staff_name);
                    //System.out.println("prof img:" + prof_img);
                }
            
                
            
           
          
            
            
            String StrDate = date.substring(date.indexOf(":")+1, date.length()).replace(",", "");
            StrDate=StrDate.trim();
            String OriginalDate = StrDate.replace(",", "");
            String datechk = StrDate.substring(0, StrDate.indexOf(" "));
            //System.out.println("Original Date"+ " " + StrDate);
            
            
            
            if( !datechk.matches(".*\\d.*") )
            {
                if(StrDate.contains("anytime, self-paced") || StrDate.contains("Anytime, Self-Paced"))
                {
                    StrDate = "0000-00-00";
                }
                else
                {
                     switch  (datechk)
                     {
                    
                    case "December": datechk = "12"; break;
                    case "November": datechk = "11"; break;
                    case "October": datechk = "10"; break;
                    case "September": datechk = "09"; break;
                    case "August": datechk = "08"; break;
                    case "July": datechk = "07"; break;
                    case "June": datechk = "06"; break;
                    case "May": datechk = "05"; break;
                    case "April": datechk = "04"; break;
                    case "Mar": datechk = "03"; break;
                    case "February": datechk = "02"; break;
                    case "January": datechk = "01"; break;
                    case "Q1" : datechk = "10"; break;
                    case "Q2" : datechk = "01"; break;
                    case "Q3" : datechk = "04"; break;
                    case "Q4" : datechk = "06"; break;
                    
                      }
                    
                    
                    StrDate = "2014-"+ datechk + "-" + "01";
                     }
            }
            else
            {
                
                String day = StrDate.substring(0, StrDate.indexOf(" ")).replace(",", "");
                String month = StrDate.substring(StrDate.indexOf(" ")+1, StrDate.indexOf(" ")+4);
                switch  (month)
                 {
                
                case "Dec": month = "12"; break;
                case "Nov": month = "11"; break;
                case "Oct": month = "10"; break;
                case "Sep": month = "09"; break;
                case "Aug": month = "08"; break;
                case "Jul": month = "07"; break;
                case "Jun": month = "06"; break;
                case "May": month = "05"; break;
                case "Apr": month = "04"; break;
                case "Mar": month = "03"; break;
                case "Feb": month = "02"; break;
                case "Jan": month = "01"; break;
                default : day = "01";
                break;
                    
                 }
                switch  (day)
                 {
                
                case "1" : day = "01"; break;
                case "2" : day = "02"; break;
                case "3" : day = "03"; break;
                case "4" : day = "04"; break;
                case "5" : day = "05"; break;
                case "6" : day = "06"; break;
                case "7" : day = "07"; break;
                case "8" : day = "08"; break;
                case "9" : day = "09"; break;
                case "1st": month = "10"; break;
                case "2nd": month = "01"; break;  
                case "3rd": month = "04"; break;
                case "4th": month = "06"; break;
                 }
                
                
                String year = StrDate.substring(StrDate.length()-4,StrDate.length()).replace(",", "");
                
                if(StrDate.contains("Q1") || StrDate.contains("1st"))
                {
                    StrDate = year + "-" + "10" + "-" + "01";
                }
                else if(StrDate.contains("Q2") || StrDate.contains("2nd"))
                {
                    StrDate = year + "-" + "01" + "-" + "01";
                }
                else if(StrDate.contains("Q3") || StrDate.contains("3rd"))
                {
                    StrDate = year + "-" + "04" + "-" + "01";
                }
                else if(StrDate.contains("Q4") || StrDate.contains("4th"))
                {
                    StrDate = year + "-" + "06" + "-" + "01";
                }
                else
                StrDate = year + "-" + month +  "-" + day;
            }
           
            
     
           
           
            
            //System.out.println(titles);
            writer.append(titles);
            writer.append(',');
            //System.out.println(short_desc);
            writer.append(short_desc);
            writer.append(',');
            //System.out.println(long_desc);
            writer.append(long_desc);
            writer.append(',');
            //System.out.println(course_url);
            writer.append(course_url);
            writer.append(',');
            //System.out.println(videolink);
            writer.append(videolink);
            writer.append(',');
            //System.out.println(date);
            writer.append(OriginalDate);
            writer.append(',');
            writer.append(StrDate);
            writer.append(',');
            //System.out.println(course_length);
            writer.append(course_length);
            writer.append(',');
            //System.out.println(course_images);
            writer.append(course_images);
            writer.append(',');
            writer.append(category);
            writer.append(',');
            //System.out.println(site_url);
            writer.append(site_url);
            writer.append(',');
            //System.out.println(price);
            writer.append(price);
            writer.append(',');
            writer.append(language);
            writer.append(',');
            writer.append(certificate);
            writer.append(',');
            //System.out.println(university);
            writer.append(university);
            writer.append(',');
            //System.out.println(timeScraped);
            writer.append(timeScraped);
            writer.append('\n');
                    
            
            }
            
    }
    writer.flush();
    writer_prof.flush();
    writer.close();
    writer_prof.close();
    }
}





